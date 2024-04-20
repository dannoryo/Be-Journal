<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title' => [
                'string',
                'required',
                'max:30',
            ],
            'img_at' => [
                'required',
                'file',
                'mimes:jpeg,jpg,png',
            ],
            'description'  => [
                'string',
                'required',
                'max:140',
            ]
            
        ];
    }
}
