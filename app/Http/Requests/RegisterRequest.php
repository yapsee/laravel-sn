<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            
                "nom"=>"required",
                "prenom"=>"required",
                "email"=>"required|email|unique:users",
                "password"=>"required|min:6|max:10",
                "confirm_password"=>"required|same:password"
              ]; 
                

    }

    public function messages(): array
    {
        return [
                "nom.required"=>"le nom est obligatoire",
                "prenom.required"=>"le prenom est obligatoire",
                "email.unique"=>"Cet email existe deja",
                "password.min"=>"le mot de passe doit contenir :min",
              ];
    }
}
