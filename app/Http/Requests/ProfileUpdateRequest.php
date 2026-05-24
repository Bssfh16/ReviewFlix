<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    
    public function rules(): array
    {
        return [
            'username' => ['required', 'unique:users,username,' . auth()->id()],
            'birthday' => ['nullable', 'date'],
            'country' => ['nullable', 'string'],
            'about' => ['nullable', 'string'],
            'pp' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
            'flavors' => ['nullable', 'array'],
            'flavors.*' => ['string', 'max:255'],    
        ];
    }
}
