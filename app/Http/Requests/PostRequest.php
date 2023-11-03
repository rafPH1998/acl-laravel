<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{
    public function prepareForValidation()
    {
        if (!auth()->user()->hasRoles(['Admin', 'Super Admin'])) {
            $this->merge([
                'user_id' => auth()->user()->id
            ]);
        }
    }

    public function authorize(): bool
    {
        return auth()->user()->can('post_create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => [
                'required',
                'exists:users,id',
                'sometimes',
                Rule::requiredIf(function() {
                    return auth()->user()->hasRoles(['Admin', 'Super Admin']);
                })
            ],
            'title' => 'required',
            'content' => 'required'
        ];
    }
}
