<?php

namespace Wingz\Foundation\Model;

use Illuminate\Database\Eloquent\Model;
use Orchestra\Model\Eloquent;
use Orchestra\Notifier\Notifiable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;
use Orchestra\Model\Traits\Searchable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Passwords\CanResetPassword;
use Orchestra\Contracts\Notification\Recipient;
use Orchestra\Contracts\Authorization\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Aircraft extends Eloquent 
{
    protected $table = 'aircraft';

    public function company() {
        return $this->belongsTo('Wingz\Foundation\Model\Companies');
    }

    public function airport() {
        return $this->belongsTo('Wingz\Foundation\Model\Airport');
    }

    protected $searchable = ['name', 'aircraft_model'];


    public function scopeSearch(Builder $query, $keyword = '')
    {
        $query->with('roles')->whereNotNull('users.id');

        return $this->setupWildcardQueryFilter($query, $keyword, $this->getSearchableColumns());
    }

}
