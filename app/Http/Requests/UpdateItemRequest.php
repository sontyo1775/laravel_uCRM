<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // 20250319 add Update機能追加
        // true 出ないと機能しない
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // add 20250319 No55 バリデーション追加
        return [
            'name' => ['required', 'max:50'],
            'memo' => ['required', 'max:255'],
            'price' => ['required', 'numeric'],
            'is_selling' => ['required', 'boolean']
        ];
    }
}
