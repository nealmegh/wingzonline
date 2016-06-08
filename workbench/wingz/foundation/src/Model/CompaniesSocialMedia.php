<?php

namespace Wingz\Foundation\Model;

use Illuminate\Database\Eloquent\Model;

class CompaniesSocialMedia extends Model
{
    protected $table = 'companies_social_media';


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

}
