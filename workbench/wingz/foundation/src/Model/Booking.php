<?php

namespace Wingz\Foundation\Model;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';
    
    public function renter() {
        return $this->belongsTo('Wingz\Foundation\Model\Renters', 'renter_id');
    }

    public function instructor() {
        return $this->belongsTo('Wingz\Foundation\Model\Instructors', 'instructor_id');
    }

    public function company() {
        return $this->belongsTo('Wingz\Foundation\Model\Companies', 'company_id');
    }

    public function aircraft() {
        return $this->belongsTo('Wingz\Foundation\Model\Aircraft', 'aircraft_id');
    }
}
