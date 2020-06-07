<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleformValidation extends FormRequest
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
            'rname'=>'required',
			'rinstitute'=>'required',
			'rstatus'=>'required'
        ];
    }
	
	
    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
			'required'=> 'This Field is Required.'
		];
    }
	
	/**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
		 'rname'=>'This Title is required',
		];
    }
}
