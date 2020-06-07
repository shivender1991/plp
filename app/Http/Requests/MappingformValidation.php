<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MappingformValidation extends FormRequest
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
            'scedcourse'=>'required',
            'scedtitle'=>'required',
            'sceddesc'=>'required',
            'changestatus'=>'required',
            'courselevel'=>'required',
            'carnegieunit'=>'required',
            'gradespan'=>'required',
            'sequnceofcourse'=>'required',
            'gradespan'=>'required'
    }
}
