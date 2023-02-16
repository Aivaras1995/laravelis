<?php

namespace App\Http\Requests;

use App\Rules\PersonalcodeRule;
use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
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
            'name'          => ['required', 'string', 'min:3', 'max:255'],
            'surname'       => ['required', 'string', 'min:3', 'max:255'],
            'personal_code' => ['nullable', 'string', new PersonalcodeRule()],
            'email'         => ['required', 'email'],
            'phone'         => ['nullable', 'string', 'min:4', 'max:9'],
            'user_id'       => ['sometimes', 'integer', 'exists:users,id'],
        ];
    }
}
