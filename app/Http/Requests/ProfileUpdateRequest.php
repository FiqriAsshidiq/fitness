<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
        public function rules(): array
        {
            return [
                'name' => ['required', 'string', 'max:20'],
                'email' => ['required', 'email', 'max:20'],
                'usia' => ['nullable', 'integer', 'min:0'],
                'berat_badan' => ['nullable', 'numeric', 'min:0'],
                'tinggi_badan' => ['nullable', 'numeric', 'min:0'],
            ];
        }
}
