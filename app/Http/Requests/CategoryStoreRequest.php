<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // يجب تغييرها إلى true
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50|unique:categories,name',
            'description' => 'nullable|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'حقل اسم الفئة مطلوب.',
            'name.string' => 'يجب أن يكون اسم الفئة نصاً.',
            'name.max' => 'يجب ألا يتجاوز اسم الفئة 50 حرفاً.',
            'name.unique' => 'اسم الفئة هذا موجود بالفعل.',
            'description.string' => 'يجب أن يكون الوصف نصاً.',
        ];
    }
}
