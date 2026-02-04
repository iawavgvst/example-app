<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProjectPolicy
{
    /**
     * Определить, может ли пользователь просматривать список проектов.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Определить, может ли пользователь просматривать конкретный проект.
     */
    public function view(User $user, Project $project): bool
    {
        return true;
    }

    /**
     * Определить, может ли пользователь создавать проекты.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Определить, может ли пользователь обновлять проект.
     */
    public function update(User $user, Project $project): bool
    {
        if($user->isAdmin()) {
            return true;
        }

        return $user->id === $project->owner_id || $user->id === $project->assignee_id;
    }

    /**
     * Определить, может ли пользователь удалять проект.
     */
    public function delete(User $user, Project $project): bool
    {
        if($user->isAdmin()) {
            return true;
        }

        return $user->id === $project->owner_id || $user->id === $project->assignee_id;
    }

    /**
     * Определить, может ли пользователь восстанавливать удаленный проект.
     */
    public function restore(User $user, Project $project): bool
    {
        return $user->isAdmin() || $user->id === $project->owner_id;
    }

    /**
     * Определить, может ли пользователь окончательно удалять проект.
     */
    public function forceDelete(User $user, Project $project): bool
    {
        return $user->isAdmin();
    }
}
