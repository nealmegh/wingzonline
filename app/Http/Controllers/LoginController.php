<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Redirect;
use Orchestra\Foundation\Http\Controllers\CredentialController;

class LoginController extends CredentialController
{
    public function userHasLoggedIn(Authenticatable $user)
    {
        return Redirect::back();
    }


}
