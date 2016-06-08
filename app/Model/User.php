<?php

namespace App\Model;

use Orchestra\Model\User as Eloquent;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Eloquent implements AuthorizableContract
{
    use Authorizable;

    protected $redirectTo = '/home';

    public function company()
    {
        return $this->hasOne('Wingz\Foundation\Model\Companies', 'user_id');
    }

    public function instructor()
    {
        return $this->hasOne('Wingz\Foundation\Model\Instructors', 'user_id');
    }

    public function renter()
    {
        return $this->hasOne('Wingz\Foundation\Model\Renters', 'user_id');
    }
//
//    // this is a recommended way to declare event handlers
//    protected static function boot() {
//        parent::boot();
//
//        static::deleting(function($user) {
//            $user->company->delete();
//            $user->instructor->delete();
//            $user->renter->delete();
//
//            // do the rest of the cleanup...
//        });
//    }

}
