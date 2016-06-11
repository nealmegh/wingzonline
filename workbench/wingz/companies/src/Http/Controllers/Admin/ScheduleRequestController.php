<?php namespace Wingz\Companies\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Orchestra\Notifier\Message;
use Orchestra\Routing\Controller;
use Orchestra\Contracts\Foundation\Foundation;

class ScheduleRequestController extends Controller
{
    public function __construct( Foundation $foundation )
    {
        $this->model      = $foundation->make('Wingz\Foundation\Model\Booking');
        $this->middleware('company');

    }

    public function activation($id, $token)
    {
        $booking = $this->model->findOrFail($id);

        if($booking->company_id != Auth::user()->company->id) {
            messages('warning', 'You are not Authorized');
        }

        if ($booking->confirm_token == $token) {
            $booking->status = 1;
            $booking->confirm_token = null;
            $booking->save();

            $message = 'Approved';

            $this->sentMail($booking, $message);

            messages('success', 'Flight Approved Successfully');
        }else {
            messages('error', 'Token Not Match Or Already Approved');
        }

        return Redirect::to( handles('orchestra::companies') );

    }



    public function reject($id, $token)
    {
        $booking = $this->model->findOrFail($id);

        if($booking->instructor_id != Auth::user()->instructor->id) {
            messages('warning', 'You are not Authorized');
        }

        if ($booking->confirm_token == $token) {
            $booking->status = 3;
            $booking->confirm_token = null;
            $booking->save();

            $message = 'Denied';

            $this->sentMail($booking, $message);

            messages('success', 'Booking Rejected Successfully');
        }else {
            messages('error', 'Token Not Match Or Already Rejected');
        }

        return Redirect::to( handles('orchestra::companies') );

    }

    public function sentMail($booking, $textMessage)
    {
        //mail to booking
        $company = $booking->company->user;
        $instructor = $booking->instructor->user;
        $renter = $booking->renter->user;

        $subject = 'Flight '.$textMessage;

        set_meta('title', 'Your flight on [Pickup Date] has been '.$textMessage);

        $data = [
            'company_name' => $booking->company->name,
            'company_phone' => $booking->company->phone,
            'company_email' => $booking->company->email

        ];
        $message = Message::create('emails.booking.booking-approval', $data, $subject);

        $company->notify($message);
        $instructor->notify($message);
        $renter->notify($message);

    }

}
