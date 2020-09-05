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
            'tipo_avatar' => 'max:255|nullable',
            'anexo_upload' => 'required_if:tipo_avatar,upload|mimes:jpeg,jpg,png,gif|max:2048|nullable',
            'tipo_avatar' => 'max:255|nullable',
            'anexo_upload' => 'required_if:tipo_avatar,upload|mimes:jpeg,jpg,png,gif|max:2048|nullable',
            'anexo_drive' => 'required_if:tipo_avatar,link_drive|nullable|url',
            'anexo_web' => 'required_if:tipo_avatar,link_web|nullable|url',
	    
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
