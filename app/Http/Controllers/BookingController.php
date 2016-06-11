<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Orchestra\Notifier\Message;
use Wingz\Foundation\Http\Requests\BookingRequest;
use Wingz\Foundation\Model\Aircraft;
use Wingz\Foundation\Model\Booking;
use Wingz\Foundation\Model\Companies;
use Wingz\Foundation\Model\Instructors;
use Wingz\Foundation\Model\Renters;


class BookingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store($id, BookingRequest $request) {
        
        $aircraft = Aircraft::find($id);
//        dd($request->all());

        $pick_up = Carbon::parse($request->dt_pick_up);
        $return = Carbon::parse($request->dt_return);

        $totalMin = $return->diffInMinutes($pick_up);
        $price_per_min = $aircraft->price_per_hour/60;
        $totalPrice = $totalMin*$price_per_min;

        $confirm_token = rand(10000,99999);

        $booking = new Booking();
        $booking->dt_pick_up = $request->dt_pick_up;
        $booking->dt_return = $request->dt_return;
        $booking->company_id = $request->company_id;
        $booking->aircraft_id = $aircraft->id;
        $booking->instructor_id = $request->instructor_id;
        $booking->renter_id = Auth::user()->renter->id;
        $booking->price = $totalPrice;
        $booking->status = '0';
        $booking->confirm_token = Crypt::encrypt($confirm_token);
        $booking->customer_email = $request->customer_email;
        $booking->save();

        $company = Companies::findOrFail($booking->company_id)->user;
        $instructor = Instructors::findOrFail($booking->instructor_id)->user;
        $renter = Renters::findOrFail($booking->renter_id)->user;

        $this->notifyRenter($renter, $booking);
        $this->notifyInstructor( $instructor, $booking);
        $this->notifyCompany($company, $booking);

        return Redirect::to('confirm-booking');
    }

    public function confirmBooking()
    {
        return view('frontend.confirm-booking');
    }

    private function notifyRenter( $renter, $booking)
    {
        $subject = 'Flight Scheduled | '.$booking->renter->first_name.', '.$booking->renter->last_name;

        $data = [
            'pickup_date' => date('F j', strtotime($booking->dt_pick_up)),
            'pickup_time' => date('g:i a', strtotime($booking->dt_pick_up)),
            'return_date' => date('F j', strtotime($booking->dt_return)),
            'return_time' => date('g:i a', strtotime($booking->dt_return)),
            'aircraft_make' => $booking->aircraft->aircraft_make,
            'aircraft_model' => $booking->aircraft->aircraft_model,
            'tail_no' => $booking->aircraft->tail_no,
            'price' => $booking->price,
            'renter_name' => $booking->renter->name,
            'renter_address' => $booking->renter->address,
            'renter_city' => $booking->renter->city,
            'renter_state' => $booking->renter->state,
            'renter_zip' => $booking->renter->zip,
            'renter_phone' => $booking->renter->phone,
            'renter_email' => $booking->renter->email
        ];
        $messageRenter = Message::create('emails.booking.new-booking', $data, $subject);

        $renter->notify($messageRenter);
    }

    public function notifyCompany($company, $booking)
    {

        $subject = 'Flight Scheduled | '.$booking->renter->first_name.', '.$booking->renter->last_name;

        $data = [
            'pickup_date' => date('F j', strtotime($booking->dt_pick_up)),
            'pickup_time' => date('g:i a', strtotime($booking->dt_pick_up)),
            'return_date' => date('F j', strtotime($booking->dt_return)),
            'return_time' => date('g:i a', strtotime($booking->dt_return)),
            'aircraft_make' => $booking->aircraft->aircraft_make,
            'aircraft_model' => $booking->aircraft->aircraft_model,
            'tail_no' => $booking->aircraft->tail_no,
            'price' => $booking->price,
            'renter_name' => $booking->renter->name,
            'renter_address' => $booking->renter->address,
            'renter_city' => $booking->renter->city,
            'renter_state' => $booking->renter->state,
            'renter_zip' => $booking->renter->zip,
            'renter_phone' => $booking->renter->phone,
            'renter_email' => $booking->renter->email,
            'type' => 'company',
            'booking'=> $booking->id,
            'code' => $booking->confirm_token
        ];
        $messageCompany = Message::create('emails.booking.new-booking', $data, $subject);
        $company->notify($messageCompany);

    }

//    public function renterNotify($renter, $booking)
//    {
//
//    }

    public function notifyInstructor($instructor, $booking)
    {
        $subject = 'Flight Scheduled | '.$booking->renter->first_name.', '.$booking->renter->last_name;
        $data = [
            'pickup_date' => date('F j', strtotime($booking->dt_pick_up)),
            'pickup_time' => date('g:i a', strtotime($booking->dt_pick_up)),
            'return_date' => date('F j', strtotime($booking->dt_return)),
            'return_time' => date('g:i a', strtotime($booking->dt_return)),
            'aircraft_make' => $booking->aircraft->aircraft_make,
            'aircraft_model' => $booking->aircraft->aircraft_model,
            'tail_no' => $booking->aircraft->tail_no,
            'price' => $booking->price,
            'renter_name' => $booking->renter->name,
            'renter_address' => $booking->renter->address,
            'renter_city' => $booking->renter->city,
            'renter_state' => $booking->renter->state,
            'renter_zip' => $booking->renter->zip,
            'renter_phone' => $booking->renter->phone,
            'renter_email' => $booking->renter->email,
            'type' => 'instructor',
            'booking'=> $booking->id,
            'code' => $booking->confirm_token
        ];
        $messageInstructor = Message::create('emails.booking.new-booking', $data, $subject);

        $instructor->notify($messageInstructor);
    }


}
