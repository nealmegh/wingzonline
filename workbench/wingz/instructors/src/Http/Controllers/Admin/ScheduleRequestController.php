<?php

namespace Wingz\Instructors\Http\Controllers\Admin;

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
        $this->middleware('instructor');

    }

    public function activation($id, $token)
    {
        $booking = $this->model->findOrFail($id);

        if($booking->instructor_id != Auth::user()->instructor->id) {
            messages('warning', 'You are not Authorized');
        }

        if ($booking->confirm_token == $token) {
            $booking->status = 1;
            $booking->confirm_token = null;
            $booking->save();
            
            $message = 'Booking Approved Successfully';

            $this->sentMail($booking, $message);

            messages('success', 'Booking Approved Successfully');
        }else {
            messages('error', 'Token Not Match Or Already Approved');
        }

        return Redirect::to( handles('orchestra::instructors') );

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

            $message = 'Booking Request Rejected';

            $this->sentMail($booking, $message);

            messages('success', 'Booking Rejected Successfully');
        }else {
            messages('error', 'Token Not Match Or Already Rejected');
        }

        return Redirect::to( handles('orchestra::instructors') );

    }

    public function sentMail($booking ,$textMessage)
    {
        //mail to booking
        $company = $booking->company->user;
        $instructor = $booking->instructor->user;
        $renter = $booking->renter->user;

        $subject = 'Booking Approved';

        $data = [
            'message' => $textMessage
        ];
        $message = Message::create('emails.booking.booking-approval', $data, $subject);

        $company->notify($message);
        $instructor->notify($message);
        $renter->notify($message);

    }

}
