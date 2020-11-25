<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' =>'required|regex:/^[\pL\s\-.]+$/u|string|min:3|max:255',
            'user_description' => 'max:255|nullable',
            'link_lattes' => 'url|string|nullable',
            'tipo_avatar' => 'nullable',
            'anexo_upload' => 'mimes:jpeg,jpg,png,gif|max:2048|nullable',
            
	    
        ];
    }
    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
           //
        ];
    }
    
}
