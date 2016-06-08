<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CompaniesRequest extends Request
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
            'company_name' => 'required',
            'company_website' => '',
            'company_address' => '',
            'company_city' => '',
            'company_state' => '',
            'company_email' => 'required',
            'company_phone' => 'required',
            'company_fax' => '',
            'airport_id' => 'required',
            'terms_policy_agreement' => 'required',
        ];
    }
}
