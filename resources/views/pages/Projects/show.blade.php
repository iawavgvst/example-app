@extends('layouts.index')

@section('title', 'Просмотр проекта')

@section('content')
    <h1>{{ $projectData->name }}</h1>

    <div>
        <a href="{{ route('projects.index') }}">
            ← Вернуться к списку проектов
        </a>
    </div>

    <div>
        <p>
            <strong>Владелец:</strong> {{ $projectData->owner_id }}
        </p>
        <p>
            <strong>Ответственный:</strong> {{ $projectData->assignee_id ?? 'Не назначен' }}
        </p>
        <p>
            <strong>Статус проекта:</strong> {{ $projectData->is_active ? 'Активный' : 'Неактивный' }}
        </p>
    </div>

    <div>
        <a href="{{ route('projects.edit', $projectData->id) }}">
            Редактировать
        </a>
    </div>
@endsection