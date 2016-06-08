<?php namespace Wingz\Instructors\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
//use Orchestra\Routing\Controller;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function index()
    {
        return view('wingz/instructors::admin.home');
    }

    public function profile()
    {
        $instructor = $this->user->instructor;
//        dd($instructor->company->airport->name);
        return view('wingz/instructors::admin.profile.instructor', compact('instructor'));
    }

    public function profileUpdate(Request $request)
    {

        $this->validate($request, [
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'phone' => '',
        ]);

        $this->user->first_name = $request->first_name;
        $this->user->last_name = $request->last_name;
        $this->user->email = $request->email;
        $this->user->phone = $request->phone;
        $this->user->position = $request->position;


        $this->user->save();

        return Redirect::back();

    }

    public function passwordUpdate(Request $request, $id)
    {
        dd($request->id);
        $this->user->password = Hash::make($request->password);
        return Redirect::back();

    }

    public function profileDelete($id)
    {
        
    }

    public function companyProfile()
    {
        return view('wingz/instructors::admin.profile.company');
    }
}
