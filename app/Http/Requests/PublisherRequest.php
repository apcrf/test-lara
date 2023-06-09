<?php

// cd D:\Server\web\test-lara\
// php artisan make:request PublisherRequest

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublisherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Изменено false на true, чтобы неавторизованный пользователь мог сохранять данные формы
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
			'publisher_name' => 'required|min:2|max:255',
			'publisher_note' => 'required|min:5',
        ];
    }

    /**
     * Замена наименований полей в сообщениях об ошибках.
     *
     * @return array<string, mixed>
     */
    public function attributes()
    {
        return [
			'publisher_name' => 'Наименование',
			'publisher_note' => 'Примечание',
        ];
	}

    /**
     * Замена стандартных сообщений об ошибках.
     * https://laravel.com/docs/6.x/validation#custom-error-messages
	 *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
			'publisher_name.required' => 'Поле ":attribute" является обязательным.',
			'publisher_name.min' => 'Поле ":attribute" должно иметь минимальную длину :min',
			'publisher_name.max' => 'Поле ":attribute" должно иметь максимальную длину :max',
        ];
	}
}
