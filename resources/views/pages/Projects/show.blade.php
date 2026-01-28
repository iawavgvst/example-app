@extends('layouts.index')

@section('title', 'Просмотр проекта')

@section('content')
    <h1>{{ $projectData->name }}</h1>

    @if($projectData->is_active)
        <x-alert type="success">
            {{ __('Проект является активным') }}.
        </x-alert>
    @else
        <x-alert type="warning">
            {{ __('Проект неактивен. Возможно, он завершен или приостановлен') }}.
        </x-alert>
    @endif

    @if(!$projectData->assignee_id)
        <x-alert type="note">
            {{ __('Обратите внимание, что у этого проекта не назначен ответственный') }}.
        </x-alert>
    @endif

    <div>
        <a href="{{ route('projects.index') }}">
            ← {{ __('Вернуться к списку проектов') }}
        </a>
    </div>

    <div>
        <p>
            <strong>{{ __('Владелец') }}:</strong> {{ $projectData->owner_id }}
        </p>
        <p>
            <strong>{{ __('Ответственный') }}:</strong> {{ $projectData->assignee_id ?? 'Не назначен' }}
        </p>
        <p>
            <strong>{{ __('Статус') }}:</strong> {{ $projectData->is_active ? 'Активный' : 'Неактивный' }}
        </p>
    </div>

    <div>
        <a href="{{ route('projects.edit', $projectData->id) }}">
            {{ __('Редактировать') }}
        </a>
    </div>
@endsection