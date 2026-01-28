<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * Данные для двух проектов
     */
    private function getProjects(): array
    {
        return [
            (object) [
                'id' => 1,
                'name' => 'Разработка маркетинговой стратегии',
                'owner_id' => 1,
                'assignee_id' => 2,
                'is_active' => true,
            ],
            (object) [
                'id' => 2,
                'name' => 'Создание дизайна',
                'owner_id' => 3,
                'assignee_id' => null,
                'is_active' => false,
            ],
        ];
    }

    /**
     * Найти проект по его ID
     */
    private function findProjectById($id): ?object
    {
        $projects = $this->getProjects();

        foreach ($projects as $project) {
            if ($project->id == $id) {
                return $project;
            }
        }

        return null;
    }

    /**
     * Вывод списка всех проектов
     *
     * Метод GET: /projects
     */
    public function index(): View
    {
        $projects = $this->getProjects();

        return view('pages.projects.index', compact('projects'));
    }

    /**
     * Показ 1 определенного проекта
     *
     * Метод GET: /projects/{project}
     */
    public function show($project): View
    {
        $projectData = $this->findProjectById($project);

        if (!$projectData) {
            abort(404, 'Проект не найден');
        }

        return view('pages.projects.show', compact('projectData'));
    }

    /**
     * Форма для создания проекта
     *
     * Метод GET: /projects/create
     */
    public function create(): View
    {
        return view('pages.projects.create');
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
    public function edit($project): View
    {
        $projectData = $this->findProjectById($project);

        if (!$projectData) {
            abort(404, 'Проект не найден');
        }

        return view('pages.projects.edit', compact('projectData'));
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