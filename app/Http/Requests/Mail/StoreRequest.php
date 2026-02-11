<?php

namespace App\Http\Requests\Mail;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'      => ['required', 'string', 'max:255'],
            'attachment' => ['required', 'file'],
        ];
    }
}
