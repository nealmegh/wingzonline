<?php

namespace Wingz\Foundation\Http\Requests;

use App\Http\Requests\Request;

class BookingRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'dt_pick_up'=>'required',
            'dt_return'=>'required',
            'company_id'=>'required',
            'aircraft_id'=>'required',
            'instructor_id'=>'required'
        ];
    }
}
