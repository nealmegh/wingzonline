<?php

namespace Wingz\Companies\Http\Requests;

use App\Http\Requests\Request;

class AircraftRequest extends Request
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
//            'date_added'=>'required',
            'aircraft_model'=>'required',
            'aircraft_make'=>'required',
            'tail_no'=>'required',
            'number_of_seats'=>'required',
            'price_per_hour'=>'required',
//            'company_id'=>'required',
//            'airport_id'=>'required',
            'view'=>''
        ];
    }
}
