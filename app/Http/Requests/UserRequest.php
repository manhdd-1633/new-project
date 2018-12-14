<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UserRequest extends FormRequest
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
        $rules = [
                'name' => 'min:3|max:255',
                'email' => 'max:255|unique:users,email',
                'password' => 'string|min:6',
                'address' => 'max:255',
                'phone' =>  'min:10|max:20',
            ];
        if ($this->id) {
            $rules['email'] = 'required|unique:users,email,' . $this->id;
        }

        return $rules;
    }

    public function messages()
    {
        return[
            'name.max' => '* Invalid name field',
            'password.min'=>'* password must be >= 6 characters',
            'address.max'=>'* address must be <= 255 character',
            'phone.min'=>'* password must be >= 8 character',

        ];
    }
}
