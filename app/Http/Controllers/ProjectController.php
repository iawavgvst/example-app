<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class ProjectController extends Controller
{
    /**
     * Вывод списка всех проектов
     *
     * Метод GET: /projects
     */
    public function index(): string
    {
        return "Список всех проектов";
    }

    /**
     * Показ 1 определенного проекта
     *
     * Метод GET: /projects/{project}
     */
    public function show($project): string
    {
        return "Проект N{$project}";
    }

    /**
     * Форма для создания проекта
     *
     * Метод GET: /projects/create
     */
    public function create(): string
    {
        return "Создать проект";
    }

    /**
     * Создание проекта
     *
     * Метод POST: /projects
     */
    public function store(): RedirectResponse
    {
        return redirect()->route('projects.index');
    }

    /**
     * Форма для редактирования проекта
     *
     * Метод GET: /projects/{project}/edit
     */
    public function edit($project): string
    {
        return "Редактировать проект N{$project}";
    }

    /**
     * Внесение изменений в определенный проект
     *
     * Метод PUT: /projects/{project}
     */
    public function update($project): RedirectResponse
    {
        return redirect()->route('projects.show', $project);
    }

    /**
     * Удаление определенного проекта
     *
     * Метод DELETE: /projects/{project}
     */
    public function destroy(): RedirectResponse
    {
        return redirect()->route('projects.index');
    }
}

/*
redirect обычно используется с store и delete, чтобы после выполнения вернуться к списку,
и с update, чтобы после выполнения показать обновленный элемент
*/
