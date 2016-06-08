<?php

namespace Wingz\Foundation\Model;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $table = 'companies';

    protected $fillable = [
        'user_id',
        'company_name',
        'contact_name',
        'address',
        'city',
        'state',
        'zip',
        'email',
        'website',
        'phone',
        'fax',
        'airport_id'
    ];

    /**
     * List of searchable attributes.
     * @var array
     */

    public function user()
    {
        return $this->belongsTo('Wingz\Foundation\Model\User', 'user_id');
    }

    public function airport()
    {
        return $this->hasOne('Wingz\Foundation\Model\Airport', 'id', 'airport_id');
    }

    public function instructors()
    {
        return $this->hasMany('Wingz\Foundation\Model\Instructors', 'company_id');
    }


    public function businessHour()
    {
        return $this->hasMany('Wingz\Foundation\Model\CompaniesBusinessHour', 'company_id');
    }

    public function socialMedia()
    {
        return $this->hasMany('Wingz\Foundation\Model\CompaniesSocialMedia', 'company_id');
    }

}
