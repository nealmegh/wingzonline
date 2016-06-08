<?php

namespace Wingz\Foundation\Model;

use Illuminate\Database\Eloquent\Model;

class CompaniesBusinessHour extends Model
{
    protected $table = 'companies_business_hour';


    /**
     * List of searchable attributes.
     *
     * @var array
     */
    protected $searchable = ['company_name'];

    public function user()
    {
        return $this->belongsTo('Wingz\Foundation\Model\User');
    }

    public function company()
    {
        return $this->belongsTo('Wingz\Foundation\Model\Companies', 'company_id');
    }

}
