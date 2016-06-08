<?php

namespace Wingz\Foundation\Model;

use Illuminate\Database\Eloquent\Model;

class Renters extends Model
{
    protected $table = 'renters';


    public function user()
    {
        return $this->belongsTo('Wingz\Foundation\Model\User');
    }
}
