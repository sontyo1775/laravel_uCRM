<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return false;
        // 20250317 修正 No47 新規作成画面
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // add 20250317 No49 バリデーション追加
        return [
            'name' => ['required', 'max:50'],
            'memo' => ['required', 'max:255'],
            'price' => ['required', 'numeric'],
        ];
    }
}
