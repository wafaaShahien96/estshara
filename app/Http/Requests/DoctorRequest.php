<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'password' => 'required',
            'phone' => 'required|numeric',
            'fees' => 'required|numeric',
            'national_id' => 'required|numeric',
            'gender' => 'required|in:male,female',
            'country_id' => 'required',
            'specialty_id' => 'required',
            'bio:en' => 'required',
            'bio:ar' => 'required',
            'image' => 'required|image',
            'documents' => 'required|array',
            'doctor_status' => 'required|in:online,offline,busy',
            'is_active' => 'required',
            'ex_type' => 'required|array'

        ];
    }
}
