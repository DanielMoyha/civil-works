<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
           /*  'name' => 'required|string|max:255',
            'username' => ['required','string','max:255', Rule::unique('users')->ignore($this->id)],
            'email' => ['required','string','email','max:255', Rule::unique('users')->ignore($this->id)],
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city_id' => 'required', */
        ];
    }


}
