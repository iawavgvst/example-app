@extends('layouts.index')

@section('title', 'Проекты')

@section('content')
    <h1>Проекты</h1>

    @if(empty($projects))
        Нет проектов.
    @else
        <div>
            @foreach($projects as $project)
                <h2>
                    <a href="{{ route('projects.show', $project->id) }}">
                        {{ $project->name }}
                    </a>
                </h2>
                <p>
                    <strong>Владелец:</strong> {{ $project->owner_id }}
                </p>
                <p>
                    <strong>Ответственный:</strong> {{ $project->assignee_id ?? 'Не назначен' }}
                </p>
                <p>
                    <strong>Статус проекта:</strong> {{ $project->is_active ? 'Активный' : 'Неактивный' }}
                </p>
            @endforeach
        </div>
    @endif
@endsection