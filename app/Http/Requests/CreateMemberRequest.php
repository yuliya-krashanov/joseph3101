<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateMemberRequest extends Request
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address_city' => 'required',
            'address_street' => 'required',
            'address_street_number' => 'required',
            'address_home_number' => 'required',
            'partner_email' => 'email',
            'agree_policy' => 'accepted',
            'mobile_phone' => 'required',
        ];
    }
}
