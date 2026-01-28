<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Проекты')</title>
    <style>
        .body-content {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            justify-content: space-between;
            text-align: center;
        }

        .main-content {
            flex: 1;
        }

        .header {
            padding-bottom: 10px;
            border-bottom: 1px solid black;
        }

        .footer {
            padding-top: 10px;
            border-top: 1px solid black;
        }
    </style>
</head>
<body>

<div class="body-content">
    <header class="header">
        @include('includes.header')
    </header>

        <main class="main-content">
            <div>
                @yield('content')
            </div>
        </main>

    <footer class="footer">
        @include('includes.footer')
    </footer>
</div>
</body>
</html>