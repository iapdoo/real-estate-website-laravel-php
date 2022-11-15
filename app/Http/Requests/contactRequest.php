<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class contactRequest extends FormRequest
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
            'contact_name' =>'required|string|max:100|',
            'contact_email'=>'required|email|string|max:50|',
            'contact_subject'=>'required|string|max:100|',
            'contact_massage'=>'required|string|min:5|',
        ];
    }
}
