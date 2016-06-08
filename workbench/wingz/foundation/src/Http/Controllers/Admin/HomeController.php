<?php namespace Wingz\Foundation\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
//use Orchestra\Routing\Controller;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function index()
    {
        return view('wingz/foundation::admin.home');
    }

    public function profile()
    {
        $user = $this->user;
        return view('wingz/foundation::admin.profile.personal', compact('user'));
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
        return view('wingz/foundation::admin.profile.company');
    }
}
