<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'name_ar' => 'required',
            'name_en' => 'required',
            'price' => 'required',
            'image' => 'required|image',
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name_ar.required' => 'يجب إدخال اسم التصنيف بالعربية !',
            'name_en.required' => 'يجب إدخال اسم التصنيف بالإنجليزية !',
            'price.required' => 'يجب وضع سعر للوجبة !',
            'image.required' => 'يجب رفع صورة للطعام !',
            'image.image' => 'يجب أن يكون الملف من نوع صورة !',
            'category_id.required' => 'يجب اختيار تصنيف للوجبة !',
        ];
    }
}
