<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Laravel Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <style>
        body {
            padding-top: 70px;
        }

        .sidebar {
            width: 280px;
            position: fixed;
            top: 70px;
            bottom: 0;
            left: 0;
            padding: 1rem;
            background-color: #f8f9fa;
            overflow-y: auto;
            border-right: 1px solid #dee2e6;
            transition: width 0.3s ease, padding 0.3s ease, left 0.3s ease;
            z-index: 1040;
        }

        .sidebar.collapsed {
            width: 70px;
            padding: 1rem 0.5rem;
        }

        .sidebar .nav-link {
            display: flex;
            align-items: center;
            font-size: 1rem;
            padding: 10px 12px;
            border-radius: 8px;
            transition: background-color 0.2s ease, color 0.2s ease;
        }

        .sidebar .nav-link:hover {
            background-color: #e2e6ea;
        }

        .sidebar .nav-link.active {
            background-color: #d1d5db;
            font-weight: bold;
        }

        .sidebar .icon {
            font-size: 1.4rem;
            width: 2rem;
            text-align: center;
        }

        .sidebar .label {
            margin-left: 0.5rem;
            transition: opacity 0.3s ease;
        }

        .sidebar.collapsed .label,
        .sidebar.collapsed .sidebar-title {
            opacity: 0;
            pointer-events: none;
            width: 0;
            overflow: hidden;
            display: inline-block;
        }

        .sidebar-title {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .content {
            margin-left: 280px;
            padding: 1.5rem;
            transition: margin-left 0.3s ease;
        }

        .content.expanded {
            margin-left: 70px;
        }

        .navbar {
            height: 70px;
            font-weight: 500;
        }

        .navbar-brand {
            font-size: 2rem;
        }

        @media (max-width: 768px) {
            .sidebar {
                left: -280px;
                height: calc(100vh - 70px);
                width: 280px;
                transition: left 0.3s ease;
            }

            .sidebar.collapsed {
                left: -280px;
            }

            .sidebar.expanded {
                left: 0;
            }

            .content {
                margin-left: 0;
                padding: 1.5rem;
            }

            body.sidebar-open::before {
                content: "";
                position: fixed;
                top: 70px;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.3);
                z-index: 1030;
            }
        }
    </style>
</head>

<body>
    @include('partials.navbar')

    @include('partials.sidebar')

    <main class="content">
        @yield('content')
    </main>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.getElementById('sidebarToggle');
        const sidebar = document.querySelector('.sidebar');
        const content = document.querySelector('.content');
        const body = document.body;

        // Restore sidebar state from localStorage
        const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
        if (isCollapsed && window.innerWidth > 768) {
            sidebar.classList.add('collapsed');
            content.classList.add('expanded');
        }

        toggleBtn.addEventListener('click', function () {
            if (window.innerWidth <= 768) {
                sidebar.classList.toggle('expanded');
                body.classList.toggle('sidebar-open');
            } else {
                sidebar.classList.toggle('collapsed');
                content.classList.toggle('expanded');

                // Save state
                localStorage.setItem('sidebarCollapsed', sidebar.classList.contains('collapsed'));
            }
        });

        // Close sidebar on outside click (mobile only)
        document.addEventListener('click', function (e) {
            if (
                window.innerWidth <= 768 &&
                sidebar.classList.contains('expanded') &&
                !sidebar.contains(e.target) &&
                e.target !== toggleBtn
            ) {
                sidebar.classList.remove('expanded');
                body.classList.remove('sidebar-open');
            }
        });
    });
</script>

</body>

</html>
