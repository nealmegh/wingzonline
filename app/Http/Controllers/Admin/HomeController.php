<?php namespace App\Http\Controllers\Admin;

use Orchestra\Routing\Controller;

class HomeController extends Controller
{

    /**
     * Show the application welcome screen to the user.
     *
     * @return mixed
     */
    public function index()
    {
        return 'hello';
    }
}
