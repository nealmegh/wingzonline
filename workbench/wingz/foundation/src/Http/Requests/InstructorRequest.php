<?php

namespace Wingz\Foundation\Http\Requests;

use App\Http\Requests\Request;

class InstructorRequest extends Request
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
            'username' => 'required|unique:users|max:50',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required',
            'email' => 'required|unique:users',
            'personal_address' => 'required',
            'personal_city' => 'required',
            'personal_state' => 'required',
            'personal_zip' => 'required',
            'personal_phone' => 'required',
            'personal_fax' => '',
            'company_id' => 'required',
            'last_flight_review_date' => 'required',
            'custom_date' => '',
            'medical_class' => '',
            'medical_class_date' => '',
            'terms_policy_agreement' => 'required',
        ];
    }
}
