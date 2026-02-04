<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class ProjectUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Правила валидации для редактирования проекта
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:100',
            'owner_id' => 'required|exists:users,id',
            'assignee_id' => 'required|exists:users,id',
            'deadline_date' => 'required',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Кастомные сообщения
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Название проекта обязательно для заполнения.',
            'name.max' => 'Название проекта не должно превышать 100 символов.',

            'owner_id.required' => 'Владелец проекта обязателен для заполнения.',
            'owner_id.exists' => 'Указанный владелец не существует.',

            'assignee_id.required' => 'Ответственный по проекту обязателен для заполнения',
            'assignee_id.exists' => 'Указанный ответственный не существует.',
        ];
    }
}
