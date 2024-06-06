<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FieldCreateRequest extends FormRequest
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
            // formのname属性で指定。
            'name' => 'required|string|max:255',
            'post' => 'required',
            'address' => 'required|string|max:255',
            'tel' => 'required|string',
            'url' => 'required|max:255',
            'image' => 'nullable',
            'current_image' => 'required',
            'detail' => 'required|string|max:500',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'フィールド名',
            'post' => '郵便番号',
            'address' => '住所',
            'tel' => '電話番号',
            'url' => 'URL',
            'image' => '画像',
            'detail' => 'フィールド説明',
        ];
    }
}
