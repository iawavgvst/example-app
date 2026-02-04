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
                <input value="{{ old('name') }}" name="name" id="name" type="text" placeholder="Название проекта">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="owner_id">{{ __('Владелец') }}: </label>
                <select name="owner_id" id="owner_id" class="form-control">
                    <option value="">Выберите владельца</option>
                    @if($users->isNotEmpty())
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('owner_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->username }}
                                @if($user->id == auth()->id())
                                    (Вы)
                                @endif
                            </option>
                        @endforeach
                    @endif
                </select>
                @error('owner_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="assignee_id">{{ __('Ответственный') }}: </label>
                <select name="assignee_id" id="assignee_id" class="form-control">
                    <option value="">Выберите ответственного</option>
                    @if($users->isNotEmpty())
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('assignee_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->username }}
                                @if($user->id == auth()->id())
                                    (Вы)
                                @endif
                            </option>
                        @endforeach
                    @endif
                </select>
                @error('assignee_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="is_active_checkbox">{{ __('Статус') }}:
                    <input type="checkbox" name="is_active" value="1" id="is_active_checkbox"
                        {{ old('is_active', true) ? 'checked' : '' }}>
                    {{ __('Активный проект') }}
                </label>
            </div>

            <div class="form-group">
                <label for="deadline_date">{{ __('Дедлайн') }}: </label>
                <input value="{{ old('deadline_date', date('Y-m-d')) }}" name="deadline_date" id="deadline_date"
                       type="date">
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

    .text-danger {
        color: #dc3545;
        font-size: 12px;
        margin-top: 5px;
    }
</style>