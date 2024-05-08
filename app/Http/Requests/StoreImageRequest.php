<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreImageRequest extends FormRequest
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
            'image_file' => [
                // ...должно быть графическим файлом.
                'image',

                // Размер файла не должен превышать...
                'max:5120', // КиБ

                // Медиатип файла должен соответствовать веб‑форматам.
                'mimes:gif,jpeg,png,webp',

                // Размер файла не должен быть меньше...
                'min:1', // КиБ

                'required',
            ],

            // Значение поля product_id...
            'sparepart_id' => [
                // ...должно встречаться в столбце id таблицы products.
                'exists:spareparts,id',
                'required',
            ],
        ];
    }
}
