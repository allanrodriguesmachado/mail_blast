<?php

namespace App\Http\Requests\Campaign;

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
        return match ($this->route('tab')) {
            'groups' => [
                'name' => 'required|string|max:255',
                'subject' => 'required|string|max:255',
                'mail_id' => 'required|exists:mails,id',
            ],
            'likes' => [
                'body' => 'required|string',

            ]
        };
    }
}
