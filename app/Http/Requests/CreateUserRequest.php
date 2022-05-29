<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateUserRequest extends FormRequest
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
            'firstname' => ['required', 'max:255'],
            'lastname' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'unique:users'],
            'private_email' => ['required', 'max:255'],
            'phone' => ['required', 'max:255'],
            'private_phone' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
            'position' => ['required', 'max:255'],
            'hired_at' => ['required', 'date'],
            'salary' => ['required', 'numeric'],
            'available_time_off' => ['required', 'numeric'],
            'team_id' => ['required', 'exists:teams,id']
        ];
    }
}
