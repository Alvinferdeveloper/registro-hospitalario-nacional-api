<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterHealthCarerRequest extends FormRequest
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
            'identification' => 'required|string|max:20|unique:health_carers,identification',
            'birthdate' => 'required|date|before:today',
            'attention_center_id'=> 'nullable',
            'area'=> 'required|string|in:MEDICINA INTERNA, ADMINISTRACION',
            'type'=> 'required|string|in:DOCTOR,ENFERMERO,ADMIN',
            'phone_number' => 'required|string|min:8|max:15',
            'email' => 'required|email|max:255|unique:health_carers,email',        
            
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
