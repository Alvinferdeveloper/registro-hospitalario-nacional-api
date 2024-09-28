<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterUserRequest extends FormRequest
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
            //
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'identification' => 'required|string|max:16|unique:patients,identification',
            'departament_id' => 'required',
            'municipio' => 'required|string',
            'city' => 'required|string',
            'address' => 'required|string',
            'birth_certificate' => 'nullable|string|max:100',
            'blood_type' => 'nullable|string|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
            'marital_status' => 'required|string|in:SOLTERO,CASADO,DIVORCIADO,VIUDO, UNION LIBRE',
            'gender' => 'required|string|in:M,F',
            'phone_number' => 'required|string|min:8|max:15',
            'birthDate' => 'required|date|before:today',
            'email' => 'required|email|max:255|unique:patients,email',
            'password' => 'required|string|min:8',
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'data' => null,
            'status' => 'validation_error',
            'message' => 'error on insert required data',
            'validation' => $validator->errors()
        ], 400));
    }
}
