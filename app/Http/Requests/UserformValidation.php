<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserformValidation extends FormRequest
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
            'fname'=>['required','numeric|min:2|max:5'],
			'lname'=>'required',
			'email'=>'required|email|max:255|unique:users',
			'username'=>'required',
			'password'=>'required',
			'instituteId'=>'required',
			'addressid'=>'required',
			'titleid'=>'required',
			'gender'=>'required',
			'status'=>'required',
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
