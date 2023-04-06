<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiskRequest extends FormRequest
{
    /**
     * Request Headers must contain `Accept: aplication/json`
     */

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
			'disk_name' => 'required|min:2|max:255',
			'disk_note' => 'required',
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
			'disk_name' => 'Наименование',
			'disk_note' => 'Примечание',
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
			'disk_name.required' => 'Поле ":attribute" является обязательным.',
			'disk_name.min' => 'Поле ":attribute" должно иметь минимальную длину :min',
			'disk_name.max' => 'Поле ":attribute" должно иметь максимальную длину :max',
			'disk_note.required' => 'Поле ":attribute" является обязательным.',
        ];
	}
}
