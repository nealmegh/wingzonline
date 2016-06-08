<?php

namespace App\Http\Controllers;

use Wingz\Foundation\Model\Airport;
use Wingz\Foundation\Model\Companies;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return mixed
     */
    public function index()
    {
        $companies = Companies::all();
        $airports = Airport::all();

        foreach ($companies as $company) {
            $lists[] = [
                'id' => $company->id,
                'type' => 'company',
                'value' => $company->name
            ];
        }

        foreach ($airports as $airport) {
            $lists[] = [
                'id' => $airport->id,
                'type' => 'airport',
                'value' => $airport->name
            ];
        }

        return view('home', compact('lists'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function flightAvailable()
    {
        return view('frontend.flightAvailable');
    }

    public function bookAircraft()
    {
        return view('frontend.bookAircraft');
    }

    public function userAccountCreate()
    {
        return view('frontend.userAccountCreate');
    }

    public function login()
    {
        return view('frontend.login');
    }

    public function privacy()
    {
        return view('frontend.privacy');
    }

    public function questions()
    {
        return view('frontend.questions');
    }


    public function companyCreate()
    {
        return view('frontend.companyCreate');
    }

    public function instructorCreate()
    {
        return view('frontend.instructorCreate');
    }

    public function renterCreate()
    {
        return view('frontend.renterCreate');
    }

    public function support()
    {
        return view('frontend.support');
    }

    public function terms()
    {
        return view('frontend.terms');
    }
    
    public function renterAccess()
    {
        return view('frontend.renter-access-only');
    }

}
