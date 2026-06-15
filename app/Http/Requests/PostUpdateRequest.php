<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class PostUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:100'],
            'content' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is mandatory',
            'title.string' => 'Title is not in an acceptable format',
            'title.max' => 'Title is too large',
            
            'content.string' => 'content is not in an acceptable format',

            'image.image' => 'It needs to be a file',
            'image.mime' => 'Image format must be jpg, jpeg or png',
            'image.max' => 'Image file is too big'
        ];
    }
}
