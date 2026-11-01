<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeasonRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:100'],
            'doctor' => ['required', 'string', 'max:50'],
            'actor' => ['required', 'string', 'max:100'],
            'premiere_date' => ['required', 'date'],
            'short_description' => ['required', 'string', 'max:300'],
            'description' => ['required', 'string', 'max:2000'],
            'key_episodes' => ['required', 'string', 'max:255'],
            'main_enemies' => ['required', 'string', 'max:255'],
            'image' => [$this->isMethod('post') ? 'required' : 'nullable', 'image', 'mimes:jpeg,png,webp', 'max:4096'],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Поле «:attribute» обязательно.',
            'max' => 'Поле «:attribute» слишком длинное (максимум :max).',
            'date' => 'Поле «:attribute» должно быть датой.',
            'image' => 'Файл должен быть картинкой.',
            'mimes' => 'Допустимые форматы: :values.',
            'image.max' => 'Картинка не больше 4 МБ.',
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'Название',
            'doctor' => 'Доктор',
            'actor' => 'Актёр',
            'premiere_date' => 'Дата премьеры',
            'short_description' => 'Краткое описание',
            'description' => 'Описание',
            'key_episodes' => 'Ключевые серии',
            'main_enemies' => 'Главные враги',
            'image' => 'Картинка',
        ];
    }
}