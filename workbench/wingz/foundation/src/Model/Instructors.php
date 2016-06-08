<?php

namespace Wingz\Foundation\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Instructors extends Model
{
    protected $table = 'instructors';

    protected $fillable = [
        'user_id',
        'company',
        'last_flight_review_date',
        'medical_class',
        'medical_class_date'
    ];

    public function scopeApproved(Builder $query)
    {
        return $query->where('status', '=', 1);
    }

    public function scopeSearch(Builder $query, $keyword = '', $roles = [])
    {
        $query->with('roles')->whereNotNull('users.id');

        if (! empty($roles)) {
            $query->whereHas('roles', function ($query) use ($roles) {
                $query->whereIn('roles.id', $roles);
            });
        }

        return $this->setupWildcardQueryFilter($query, $keyword, $this->getSearchableColumns());
    }
    
    public function user()
    {
        return $this->belongsTo('Wingz\Foundation\Model\User', 'user_id');
    }

    public function company()
    {
        return $this->belongsTo('Wingz\Foundation\Model\Companies', 'company_id');
    }

    public function timeOff()
    {
        return $this->belongsTo('Wingz\Foundation\Model\InstructorsTimeOff', 'instructor_id');
    }


}
