<?php

namespace Wingz\Foundation\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class InstructorsTimeOff extends Model
{
    protected $table = 'instructors_time_off';


    public function instructor()
    {
        return $this->belongsTo('Wingz\Foundation\Model\Instructor', 'instructor_id');
    }


}
