<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|min:10|max:255|regex:/^[\pL\s\-]+$/u',
            'email' => 'email:rfc,dns',
            'gender'=> 'required|in:male,female',
            'select_country'=>'required|in:Россия,Англия,США',
            'description' => 'required|min:10|max:1000',

        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Поле ФИО является обязательным',
            'name.min'=>'Поле ФИО является обязательным,должен содержать не менее 10 символов',
            'name.regex'=>'Поле ФИО должно содержать только буквы',
            'email.email' => 'Введите вашу существующую электронную почту',
            'gender.required'=>'Выберите ваш пол',
            'select_country.required'=>'Выберите выберите страну проживания',
            'description.required'=>'Поле "Опишите подробнее" должно содержать от 10 до 1000 символов'




        ];
    }
}
