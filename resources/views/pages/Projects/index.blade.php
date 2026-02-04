@extends('layouts.index')

@section('title', 'Проекты')

@section('content')
    <h1>{{ __('Проекты') }}</h1>

    <x-alert type="note">
        {{ __('Здесь отображаются все проекты. Вы можете создавать новые проекты или редактировать существующие') }}.
    </x-alert>

    @if($projects->isEmpty())
        <x-alert type="warning">
            {{ __('В системе пока нет проектов') }}. <a
                href="{{ route('projects.create') }}">{{ __('Создайте проект') }}</a>.
        </x-alert>
    @else
        <x-alert type="success">
            {{ __('Загружено проектов') }}: {{ count($projects) }}.
        </x-alert>

        <div>
            @foreach($projects as $project)
                <h2>
                    <a href="{{ route('projects.show', $project->id) }}">
                        {{ $project->name }}
                    </a>
                </h2>
                <p>
                    <strong>{{ __('Владелец') }}:</strong> {{ $project->owner->username }}
                </p>
                <p>
                    <strong>{{ __('Ответственный') }}:</strong> {{ $project->assignee->username }}
                </p>
                <p>
                    <strong>{{ __('Статус') }}:</strong>
                    @if($project->is_active)
                        <span style="color: green;">● Активный</span>
                    @else
                        <span style="color: gray;">● Неактивный</span>
                    @endif
                </p>
                <p>
                    <strong>{{ __('Дедлайн') }}:</strong> {{ $project->deadline_date->format('d-m-Y') }}
                </p>
            @endforeach
        </div>
    @endif
@endsection