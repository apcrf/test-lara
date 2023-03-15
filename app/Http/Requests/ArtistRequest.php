<?php

// cd D:\Server\web\test-lara\
// php artisan make:request ArtistRequest

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtistRequest extends FormRequest
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
			'artist_name' => 'required|min:2|max:255',
			'artist_note' => '',
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
			'artist_name' => 'Наименование',
			'artist_note' => 'Примечание',
        ];
	}

    /**
     * Замена стандартных сообщений об ошибках.
	 *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
			'artist_name.required' => 'Поле ":attribute" является обязательным.',
			'artist_name.min' => 'Поле ":attribute" должно иметь минимальную длину :min',
			'artist_name.max' => 'Поле ":attribute" должно иметь максимальную длину :max',
        ];
	}
}
