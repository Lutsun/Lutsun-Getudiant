<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Getudiant</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/liste.css') }}">
    <link rel="stylesheet" href="{{ asset('css/createclasse.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="app-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-logo">
                <div class="logo-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h1>Getudiant</h1>
            </div>
            
            <nav class="sidebar-nav">
                <ul>
                    <li class="{{ request()->is('/') ? 'active' : '' }}">
                        <a href="/">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Tableau de bord</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('etudiants*') ? 'active' : '' }}">
                        <a href="/etudiant/create">
                            <!-- ajout d'etudiant -->
                             <i class="fas fa-add"></i>
                            <span>Ajouter un etudiant</span>
                        </a>
                        <a href="/etudiant/liste">
                            <i class="fas fa-users"></i>
                            <span>Liste des etudiants</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('classes*') ? 'active' : '' }}">
                        <a href="/classe/create">
                            <i class="fas fa-add"></i>
                            <span>Ajouter une classe</span>
                        </a>
                        <a href="/classe/liste">
                            <i class="fas fa-chalkboard"></i>
                            <span>Liste des Classes</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('inscriptions*') ? 'active' : '' }}">
                        <a href="/inscriptions">
                            <i class="fas fa-file-signature"></i>
                            <span>Inscriptions</span>
                        </a>
                    </li>
                </ul>
            </nav>
            
            <div class="sidebar-footer">
                <div class="user-info">
                    <div class="user-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="user-details">
                        <span class="user-name">Serge Da Sylva</span>
                        <span class="user-role">Super Admin</span>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <header class="main-header">
                <h2>@yield('title')</h2>
                <div class="header-actions">
                    <div class="notification">
                        <i class="fas fa-bell"></i>
                        <span class="badge">3</span>
                    </div>
                    <div class="user-menu">
                        <i class="fas fa-user-circle"></i>
                    </div>
                </div>
            </header>
            
            <div class="content-wrapper">
                @yield('content')
            </div>
        </main>
    </div>
    
    <script>
        // Script pour la sidebar responsive
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.querySelector('.menu-toggle');
            const sidebar = document.querySelector('.sidebar');
            
            if (menuToggle) {
                menuToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('collapsed');
                });
            }
        });
    </script>
</body>
</html>