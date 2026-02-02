@extends('layouts.index')

@section('title', 'Просмотр проекта')

@section('content')
    <h1>{{ $project->name }}</h1>

    @if($project->is_active)
        <x-alert type="success">
            {{ __('Проект является активным') }}.
        </x-alert>
    @else
        <x-alert type="warning">
            {{ __('Проект неактивен. Возможно, он завершен или приостановлен') }}.
        </x-alert>
    @endif

    <div>
        <a href="{{ route('projects.index', ['access' => 'yes']) }}">
            ← {{ __('Вернуться к списку проектов') }}
        </a>
    </div>

    <div>
        <p>
            <strong>{{ __('Владелец') }}:</strong> {{ $project->owner_id }}
        </p>
        <p>
            <strong>{{ __('Ответственный') }}:</strong> {{ $project->assignee_id ?? 'Не назначен' }}
        </p>
        <p>
            <strong>{{ __('Статус') }}:</strong> {{ $project->is_active ? 'Активный' : 'Неактивный' }}
        </p>
        <p>
            <strong>{{ __('Дедлайн') }}:</strong> {{ $project->deadline_date->format('d-m-Y') }}
        </p>
    </div>

    <div>
        <a href="{{ route('projects.edit', $project->id) }}">
            {{ __('Редактировать') }}
        </a>
    </div>
@endsection