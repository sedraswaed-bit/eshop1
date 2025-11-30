<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryUpdateRequest extends FormRequest
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
        // الحصول على معرف الفئة من المسار (Route)
        $categoryId = $this->route('category')->category_id;

        return [
            'name' => [
                'required',
                'string',
                'max:50',
                // التأكد من أن الاسم فريد، باستثناء الفئة الحالية
                Rule::unique('categories', 'name')->ignore($categoryId, 'category_id'),
            ],
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
