<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
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
        $method = $this->method();
        if ($method == 'PUT'){
            return [
                'name' => ['required'],
                'type' => ['required', Rule::in(['I','B','i','b'])],
                'email' => ['required','email'],
                'address' => ['required'],
                'city' => ['required'],
                'state' => ['required'],
                'postalCode' => ['required'],
                //

            ];

        }else{
            return [
                'name' => ['sometime','required'],
                'type' => ['sometime','required', Rule::in(['I','B','i','b'])],
                'email' => ['sometime','required','email'],
                'address' => ['sometime','required'],
                'city' => ['sometime','required'],
                'state' => ['sometime','required'],
                'postalCode' => ['sometime','required'],

            ];
        }

    }
    protected function prepareForValidation()
    {
        if ($this->postalCode){

            $this->merge([
                'postal_code' => 'postalCode',
            ]);
        }
    }
}
