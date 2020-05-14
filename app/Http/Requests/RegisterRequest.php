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
            'name' =>'required|alpha|string|min:3|max:255',
	    'surname' =>'required|alpha|string|min:3|max:255',
            'user_description' => 'max:255|nullable',
            'link_lattes' => 'url|string|nullable',
            'avatar' => 'mimes:jpeg,jpg,png,gif|max:2048|nullable' 
	    
        ];
    }
    
}
