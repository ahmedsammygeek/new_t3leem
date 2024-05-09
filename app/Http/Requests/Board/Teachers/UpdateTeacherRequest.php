<?php

namespace App\Http\Requests\Board\Teachers;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherRequest extends FormRequest
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
            'image' => 'nullable|image' , 
            'mobile' => 'required|size:11|unique:users,mobile,'.$this->teacher->id , 
            'is_active' => 'nullable' , 
            'permissions' => 'required'
        ];
    }
}
