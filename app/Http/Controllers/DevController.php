<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class DevController extends Controller
{
    public function index(Request $request, string $action = null)
    {
        if ($action === null) {
            $result = '<p>Available actions:</p><ul>';
            foreach (array_diff(get_class_methods($this), get_class_methods(Controller::class)) as $method) {
                if ($method !== 'index') {
                    $result .= '<li><a href="/dev/' . $method . '">' . $method . '</a></li>';
                }
            }

            return $result . '</ul>';
        }

        if (method_exists($this, $action)) {
            return $this->{$action}($request);
        }

        return null;
    }
    public function getDummyConfig()
    {
        return config('services.dummy_json');
    }

    /**
     * Добавление 5 проектов со случайно сгенерированными данными
     */
    public function addProject()
    {
        $faker = Faker::create();

        for($i = 0; $i < 5; $i++) {
            Project::create([
                'name' => $faker->sentence(3),
                'owner_id' => $faker->numberBetween(1, 3),
                'is_active' => $faker->boolean(),
                'assignee_id' => $faker->numberBetween(1, 3),
                'deadline_date' => $faker->dateTimeBetween('now', '+6 months'),
            ]);
        }

        return 'Вы добавили 5 проектов';
    }

    /**
     * Проекты даминов с их владельцами
     */
    public function getAdminProjects()
    {
        $projects = Project::query()
            ->whereHas('owner', function ($query) {
                $query->where('role', 'admin');
            })->with('owner')->get();

        return $projects;
    }

    /**
     * Проекты с истекшим дедлайном
     */
    public function getExpired()
    {
        $projects = Project::query()
            ->where('deadline_date', '<', now())
            ->orderBy('deadline_date', 'asc')
            ->get();

        return $projects;
    }

    /**
     * Получение 1-го случайного проекта с его обновлением (случайно сгенерированные данные)
     */
    public function updateRandom()
    {
        $faker = Faker::create();

        $project = Project::query()->inRandomOrder()->first();
        $project->update([
            'name' => $faker->sentence(3),
            'owner_id' => $faker->numberBetween(1, 3),
            'is_active' => $faker->boolean(),
            'assignee_id' => $faker->numberBetween(1, 3),
            'deadline_date' => $faker->dateTimeBetween('now', '+6 months'),
        ]);

        return $project;
    }
}
