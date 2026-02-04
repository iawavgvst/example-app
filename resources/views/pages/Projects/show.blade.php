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
            <strong>{{ __('Владелец') }}:</strong> {{ $project->owner->username }}
        </p>
        <p>
            <strong>{{ __('Ответственный') }}:</strong> {{ $project->assignee->username ?? 'Не назначен' }}
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
    </div>

    <div>
        @can('update', $project)
            <a href="{{ route('projects.edit', $project->id) }}">
                {{ __('Редактировать') }}
            </a>
        @endcan

        @can('delete', $project)
            <form action="{{ route('projects.destroy', $project->id) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Вы уверены, что хотите удалить проект {{ $project->name }}? Это действие нельзя отменить.')">
                    {{ __('Удалить проект') }}
                </button>
            </form>
        @endcan
    </div>
@endsection

<style>
    .btn-danger {
        margin-top: 5px;
    }
</style>