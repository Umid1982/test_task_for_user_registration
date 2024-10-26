<?php

namespace App\Http\Requests\Auth;

use App\DTOs\UserDTO;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|max:255|confirmed',
            'gender' => 'required|string|in:male,female,other',
        ];
    }

    public function toDTO():UserDTO
    {
        return new UserDTO(
            $this->get('email'),
            $this->get('password'),
            $this->get('gender'),
        );
    }
}
