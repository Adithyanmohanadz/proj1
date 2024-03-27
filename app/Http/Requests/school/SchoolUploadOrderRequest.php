<?php

namespace App\Http\Requests\school;

use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class SchoolUploadOrderRequest extends FormRequest
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
            'file_name' => 'required|string',
            'resource' => 'required|file|mimes:pdf,docx,doc,php,jpg,jpeg,png|max:9048',
        ];
    }

    // protected function failedValidation(Validator $validator)
    // {
    //     $response = new JsonResponse([
    //         'response' => 'error',
    //         'message' => 'Validation failed',
    //         'errors' => $validator->errors(),
    //     ], 422);

    //     throw new HttpResponseException($response);
    // }
    public function messages()
    {
        return [
            'file_name.required' => 'The file name is required edited edited.',
            'resource.required' => 'The resource file is required.',
            // Add custom messages for other rules as needed
        ];
    }
}
