<?php

namespace App\Http\Requests\Board\Admins;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
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
            'name' => 'required' , 
            'mobile' => 'required|size:11|unique:users,mobile' , 
            'password' => 'required|min:8|confirmed' , 
            'image' => 'nullable|image' , 
            'is_super_admin' => 'nullable' , 
            'is_active' => 'nullable' , 
            'permissions' => 'required_unless:is_super_admin,true'
        ];
    }
}
