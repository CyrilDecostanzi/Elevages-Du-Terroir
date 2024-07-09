<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditAnimalRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'age' => ['required', 'integer', 'min:0'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'type_id' => ['required', 'integer', 'exists:types,id'],
            'breed_id' => ['required', 'integer', 'exists:breeds,id'],
            'image_upload' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ];
    }
}
