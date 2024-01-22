<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class EmployeeFormRequest extends FormRequest
{
    
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
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'company_id' => 'required|exists:companies,id',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
        ];
    }

    // display error messages
    public function messages()
    {
        return [
            'first_name.required' => 'First name is required!',
            'last_name.required' => 'Last name is required!',
            'company_id.exists' => 'The selected company is invalid.',
        ];
    }

    
}
