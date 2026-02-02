<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * Вывод списка всех проектов
     *
     * Метод GET: /projects
     */
    public function index(): View
    {
        $projects = Project::all();

        return view('pages.projects.index', compact('projects'));
    }

    /**
     * Показ 1 определенного проекта
     *
     * Метод GET: /projects/{project}
     */
    public function show(Project $project): View
    {
        return view('pages.projects.show', compact('project'));
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
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'owner_id' => 'required|integer|min:1',
            'assignee_id' => 'nullable|integer|min:1',
            'deadline_date' => 'required|date',
            'is_active' => 'boolean',
        ]);

        Project::create($validated);

        return redirect()->route('projects.index');
    }

    /**
     * Форма для редактирования проекта
     *
     * Метод GET: /projects/{project}/edit
     */
    public function edit(Project $project): View
    {
        return view('pages.projects.edit', compact('project'));
    }

    /**
     * Внесение изменений в определенный проект
     *
     * Метод PUT: /projects/{project}
     */
    public function update(Request $request, Project $project): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'owner_id' => 'required|integer|min:1',
            'assignee_id' => 'nullable|integer|min:1',
            'deadline_date' => 'required|date',
            'is_active' => 'boolean',
        ]);

        $project->update($validated);

        return redirect()->route('projects.show', $project);
    }

    /**
     * Удаление определенного проекта
     *
     * Метод DELETE: /projects/{project}
     */
    public function destroy(Project $project): RedirectResponse
    {
        $project->delete();

        return redirect()->route('projects.index');
    }
}

/*
redirect обычно используется с store и delete, чтобы после выполнения вернуться к списку,
и с update, чтобы после выполнения показать обновленный элемент
*/