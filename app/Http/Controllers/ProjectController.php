<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\ProjectStoreRequest;
use App\Http\Requests\Project\ProjectUpdateRequest;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
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
        Gate::authorize('viewAny', Project::class);

        $projects = Project::orderBy('created_at')->get();

        return view('pages.projects.index', compact('projects'));
    }

    /**
     * Показ 1 определенного проекта
     *
     * Метод GET: /projects/{project}
     */
    public function show(Project $project): View
    {
        Gate::authorize('view', $project);

        return view('pages.projects.show', compact('project'));
    }

    /**
     * Форма для создания проекта
     *
     * Метод GET: /projects/create
     */
    public function create(): View
    {
        Gate::authorize('create', Project::class);

        $users = User::all();

        return view('pages.projects.create', compact('users'));
    }

    /**
     * Создание проекта
     *
     * Метод POST: /projects
     */
    public function store(ProjectStoreRequest $request): RedirectResponse
    {
        Gate::authorize('create', Project::class);

        $data = $request->validated();
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        Project::create($data);

        return redirect()->route('projects.index', ['access' => 'yes']);
    }

    /**
     * Форма для редактирования проекта
     *
     * Метод GET: /projects/{project}/edit
     */
    public function edit(Project $project): View
    {
        Gate::authorize('update', $project);

        $users = User::all();

        return view('pages.projects.edit', compact('project', 'users'));
    }

    /**
     * Внесение изменений в определенный проект
     *
     * Метод PUT: /projects/{project}
     */
    public function update(ProjectUpdateRequest $request, Project $project): RedirectResponse
    {
        Gate::authorize('update', $project);

        $data = $request->validated();
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        $project->update($data);

        return redirect()->route('projects.show', $project);
    }

    /**
     * Удаление определенного проекта
     *
     * Метод DELETE: /projects/{project}
     */
    public function destroy(Project $project): RedirectResponse
    {
        Gate::authorize('delete', $project);

        $project->delete();

        return redirect()->route('projects.index', ['access' => 'yes']);
    }
}

/*
redirect обычно используется с store и delete, чтобы после выполнения вернуться к списку,
и с update, чтобы после выполнения показать обновленный элемент
*/