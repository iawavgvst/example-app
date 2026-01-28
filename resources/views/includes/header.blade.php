<div>
    <nav class="navbar">
        <div class="nav-item">
            <a href="{{ route('projects.index') }}">
                Проекты
            </a>
        </div>
        <div class="nav-item">
            <a href="{{ route('projects.create') }}">
                Создать проект
            </a>
        </div>
        <div class="nav-item">
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        Выйти
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary">
                    Войти
                </a>
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
