<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'price' => 'required|integer|max:12500'
        ];
    }
    
    public function messages(): array
    {
        return [
            'name.required' => 'Kitabın adı zorunludur',
            'price.required' => 'Kitabın fiyatı zorunludur',
            'name.max' => 'kitabın ismi 50 karakterden fazla olamaz',
            'price.integer' => 'Fiyat değeri tam sayı olmalıdır',
            'price.min' => 'Fiyat değeri en az 0 olmalıdır', 
            'price.max' => 'Kitabın fiyatı en fazla 12500 lira olabilir.'
        ];
    }
}
