@extends('layouts.index')

@section('title', 'Редактировать')

@section('content')
    <h1>{{ __('Форма редактирования') }}</h1>

    <div>
        <a href="{{ route('projects.index') }}">
            ← {{ __('Вернуться к списку проектов') }}
        </a>
    </div>
    <div>
        <a href="{{ route('projects.show', $projectData->id) }}">
            ← {{ __('Вернуться к проекту') }}
        </a>
    </div>

    <section class="section-form">
        <form action="{{ route('projects.update', $projectData->id) }}" method="post">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="name">{{ __('Название') }}: </label>
                <input id="name" type="text" value="{{ $projectData->name }}">
            </div>

            <div class="form-group">
                <label for="owner">{{ __('Владелец') }}: </label>
                <input id="owner" type="text" value="{{ $projectData->owner_id }}">
            </div>

            <div class="form-group">
                <label for="assignee">{{ __('Ответственный') }}: </label>
                <input id="assignee" type="text" value="{{ $projectData->assignee_id ?? 'Не назначен' }}">
            </div>

            <div class="form-group">
                <label for="isActive">{{ __('Статус') }}: </label>
                <input id="isActive" type="text" value="{{ $projectData->is_active ? 'Активный' : 'Неактивный' }}">
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