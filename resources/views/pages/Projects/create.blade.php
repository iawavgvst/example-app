@extends('layouts.index')

@section('title', 'Создать проект')

@section('content')
    <h1>Форма создания</h1>

    <div>
        <a href="{{ route('projects.index') }}">
            ← Вернуться к списку проектов
        </a>
    </div>

    <section class="form-group">
        <form action="{{ route('projects.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="name">Название: </label>
                <input id="name" type="text" placeholder="Название проекта">
            </div>

            <div class="form-group">
                <label for="owner">Владелец: </label>
                <input id="owner" type="text" placeholder="Владелец проекта">
            </div>

            <div class="form-group">
                <label for="assignee">Ответственный: </label>
                <input id="assignee" type="text" placeholder="Отвпетственный проекта">
            </div>

            <div class="form-group">
                <label for="isActive">Статус: </label>
                <input id="isActive" type="text" placeholder="Статус проекта">
            </div>

            <div class="btn">
                <button class="btn btn-primary text-uppercase" id="submitButton" type="submit">
                    Создать
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