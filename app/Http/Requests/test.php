<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class test extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        //Request-Validation
        return [
            //Request-Validation Snippet
        ];
        //Request-Available Validation Rules
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(){
        return [
            //Request-Validation Customize Message Snippet
        ];
    }
}
