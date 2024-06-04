<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFileRequest extends FormRequest
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
            'file' => 'mimes:pdf|required|max:10000',
            'id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'file.mimes' => 'El archivo debe ser pdf',
            'file.required' => 'El campo :attribute es obligatorio',
            'id.required' => 'Es necesario este dato',
        ];
    }
}
