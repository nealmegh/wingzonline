<?php namespace Wingz\Foundation\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Orchestra\Notifier\Message;

//use Orchestra\Routing\Controller;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->user = Auth::user();
    }


    public function profile()
    {
        $user = $this->user;
//        set_meta('header::add-button', 'yoo');
        return view('wingz/foundation::admin.profile.personal', compact('user'));
    }

    public function profileUpdate(Request $request)
    {

        $this->validate($request, [
            'first_name' => '',
            'last_name' => '',
            'email' => 'unique:users',
            'phone' => '',
        ]);

        $this->user->first_name = $request->first_name;
        $this->user->last_name = $request->last_name;
        $this->user->email = $request->email;
        $this->user->phone = $request->phone;
        $this->user->position = $request->position;


        $this->user->save();
        $data = [
            'message' => 'Profile Update Successfully'
        ];

        $this->thankYou($this->user, $data);

        return Redirect::back();

    }

    public function passwordUpdate(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required'
        ]);
        

        $condition = $this->matchPassword($request->old_password);

        if ($condition == true) {
            $this->user->password = Hash::make($request->new_password);
            $this->user->save();

            $data = [
                'message' => 'Password Update Successfully'
            ];

            $this->thankYou($this->user, $data);

            messages('success', 'Password Change Successfully');

        }else {
            messages('error', 'Wrong Password');
        }


        return Redirect::back();

    }

    public function profileDelete($id)
    {
        
    }

    private function matchPassword($old)
    {
        $checked  = Hash::check($old, $this->user->password);
        return $checked;
    }

    public function companyProfile()
    {
        return view('wingz/foundation::admin.profile.company');
    }

    public function thankYou($user, $data)
    {

        $subject = 'Password Change';
        $message = Message::create('emails.user.passwordUpdate', $data, $subject);

        $receipt = $user->notify($message);

        if ($receipt->failed()) {
            //essage('');
        }else {

        }

    }
}
