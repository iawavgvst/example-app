<div>
    <nav class="navbar">
        <div class="nav-item">
            <a href="{{ route('projects.index', ['access' => 'yes']) }}">
                {{ __('Проекты') }}
            </a>
        </div>
        @can('create', App\Models\Project::class)
            <div class="nav-item">
                <a href="{{ route('projects.create') }}">
                    {{ __('Создать проект') }}
                </a>
            </div>
        @endcan
        <div class="nav-item">
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        {{ __('Выйти') }}
                    </button>
                </form>
            @endauth
        </div>
    </nav>
</div>

<style>
    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .btn-danger {
        background: red;
        border: none;
        color: whitesmoke;
        font-size: 15px;
        padding: 5px 10px 5px 10px;
    }
</style>
