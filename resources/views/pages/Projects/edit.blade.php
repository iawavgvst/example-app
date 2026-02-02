@extends('layouts.index')

@section('title', 'Редактировать')

@section('content')
    <h1>{{ __('Форма редактирования') }}</h1>

    <div>
        <a href="{{ route('projects.index', ['access' => 'yes']) }}">
            ← {{ __('Вернуться к списку проектов') }}
        </a>
    </div>
    <div>
        <a href="{{ route('projects.show', $project->id) }}">
            ← {{ __('Вернуться к проекту') }}
        </a>
    </div>

    <section class="section-form">
        <form action="{{ route('projects.update', $project->id) }}" method="post">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="name">{{ __('Название') }}: </label>
                <input name="name" id="name" type="text" value="{{ $project->name }}" required>
            </div>

            <div class="form-group">
                <label for="owner_id">{{ __('Владелец') }}: </label>
                <input name="owner_id" id="owner_id" type="number" value="{{ $project->owner_id }}" required min="1">
            </div>

            <div class="form-group">
                <label for="assignee_id">{{ __('Ответственный') }}: </label>
                <input name="assignee_id" id="assignee_id" type="number"
                       value="{{ $project->assignee_id ?? 'Не назначен' }}" min="1">
            </div>

            <div class="form-group">
                <label for="is_active">{{ __('Статус') }}:
                    <input type="hidden" name="is_active" id="is_active" value="0">
                    <input value="1" name="is_active" id="is_active"
                           type="checkbox" {{ $project->is_active ? 'checked' : '' }}>
                    {{ __('Активный проект') }}
                </label>
            </div>

            <div class="form-group">
                <label for="deadline_date">{{ __('Дедлайн') }}: </label>
                <input name="deadline_date" id="deadline_date" type="date"
                       value="{{ $project->deadline_date->format('Y-m-d') }}" required>
            </div>

            <div class="btn">
                <button class="btn btn-primary text-uppercase" id="submitButton" type="submit">
                    {{ __('Обновить') }}
                </button>
            </div>

        </form>
    </section>
@endsection

<style>
    .form-group {
        margin-bottom: 7px;
        font-weight: 600;
        margin-top: 7px;
    }

    input {
        font-size: 13px;
        width: 250px;
    }
</style>