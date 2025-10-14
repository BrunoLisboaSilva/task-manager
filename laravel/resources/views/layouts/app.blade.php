<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Ícones Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

   <style>
    

    body {
        transition: background-color 0.4s ease, color 0.4s ease;
        min-height: 100vh;
    }

    /* Tema claro */
    html[data-bs-theme="light"] body {
        background-color: #f8f9fa !important;
        color: #212529 !important;
    }

    /* Tema escuro */
    html[data-bs-theme="dark"] body {
        background-color: #0d1117 !important; /* Agora sim, fundo escuro real */
        color: #e6edf3 !important;
    }

    /* Navbar */
    html[data-bs-theme="dark"] .navbar {
        background-color: #161b22 !important;
    }

    /* Cards */
    html[data-bs-theme="dark"] .card {
        background-color: #1c2128 !important;
        border-color: #30363d !important;
        color: #e6edf3 !important;
    }

    /* Botões */
    html[data-bs-theme="dark"] .btn-primary {
        background-color: #238636 !important;
        border-color: #2ea043 !important;
    }

    html[data-bs-theme="dark"] .btn-outline-secondary {
        border-color: #8b949e !important;
        color: #c9d1d9 !important;
    }

    /* Ajustes visuais */
    .card {
        border-radius: 20px;
        transition: all 0.3s ease;
    }

    .btn {
        border-radius: 10px;
    }

    .theme-toggle {
        cursor: pointer;
    }
</style>

</head>
<body>
  
    {{-- Navbar com botão de tema --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="{{ route('tasks.index') }}">
                <i class="bi bi-list-check"></i> TaskManager
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center gap-3">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('tasks.index') ? 'active fw-bold' : '' }}" href="{{ route('tasks.index') }}">
                            <i class="bi bi-house-door"></i> Início
                        </a>
                    </li>

                    <li><a href="{{ route('dashboard') }}" class="btn btn-outline-primary me-2">
    <i class="bi bi-bar-chart-fill"></i> Dashboard
</a></li>
                   
                    </li>
                    <li class="nav-item">
                        <button id="themeToggle" class="btn btn-outline-secondary theme-toggle">
                            <i class="bi bi-moon-fill"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    

    {{-- Conteúdo das páginas --}}
    <main>
        @yield('content')
    </main>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Script Dark Mode --}}
    <script>
        const themeToggle = document.getElementById('themeToggle');
        const htmlElement = document.documentElement;
        const currentTheme = localStorage.getItem('theme') || 'light';

        // Aplica tema salvo
        htmlElement.setAttribute('data-bs-theme', currentTheme);
        updateIcon(currentTheme);

        themeToggle.addEventListener('click', () => {
            const newTheme = htmlElement.getAttribute('data-bs-theme') === 'light' ? 'dark' : 'light';
            htmlElement.setAttribute('data-bs-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateIcon(newTheme);
        });

        function updateIcon(theme) {
            const icon = themeToggle.querySelector('i');
            if (theme === 'dark') {
                icon.classList.replace('bi-moon-fill', 'bi-sun-fill');
                themeToggle.classList.replace('btn-outline-secondary', 'btn-outline-light');
            } else {
                icon.classList.replace('bi-sun-fill', 'bi-moon-fill');
                themeToggle.classList.replace('btn-outline-light', 'btn-outline-secondary');
            }
        }
    </script>
</body>
</html>
