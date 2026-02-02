@extends('layouts.index')

@section('title', 'Создать проект')

@section('content')
    <h1>{{ __('Форма создания') }}</h1>

    <x-alert type="note">
        {{ __('Заполните форму для создания нового проекта') }}.
    </x-alert>

    <div>
        <a href="{{ route('projects.index', ['access' => 'yes']) }}">
            ← {{ __('Вернуться к списку проектов') }}
        </a>
    </div>

    <section class="form-group">
        <form action="{{ route('projects.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="name">{{ __('Название') }}: </label>
                <input value="{{ old('name') }}" name="name" id="name" type="text" placeholder="Название проекта"
                       required>
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="owner_id">{{ __('Владелец') }}: </label>
                <input value="{{ old('owner_id') }}" name="owner_id" id="owner_id" type="number"
                       placeholder="Владелец проекта" required min="1">
                @error('owner_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="assignee_id">{{ __('Ответственный') }}: </label>
                <input value="{{ old('assignee_id') }}" name="assignee_id" id="assignee_id" type="number"
                       placeholder="Ответственный по проекту" min="1">
                @error('assignee_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="is_active">{{ __('Статус') }}:
                    <input type="hidden" name="is_active" id="is_active" value="0">
                    <input name="is_active" value="1" id="is_active"
                           type="checkbox" {{ old('is_active', true) ? 'checked' : '' }}>
                    {{ __('Активный проект') }}
                </label>
            </div>

            <div class="form-group">
                <label for="deadline_date">{{ __('Дедлайн') }}: </label>
                <input value="{{ old('deadline_date', date('d-m-Y')) }}" name="deadline_date" id="deadline_date"
                       type="date" required>
                @error('deadline_date')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="btn">
                <button class="btn btn-primary text-uppercase" id="submitButton" type="submit">
                    {{ __('Создать') }}
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