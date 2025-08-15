<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Laravel Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        body {
            padding-top: 70px;
            /* Match navbar height */
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
            width: 0;
            padding: 0;
            overflow: hidden;
            border: none;
        }

        .sidebar.expanded {
            left: 0;
        }

        .content {
            margin-left: 280px;
            padding: 1.5rem;
            transition: margin-left 0.3s ease;
        }

        .content.expanded {
            margin-left: 0;
        }

        .navbar-nav .nav-link {
            font-size: 1.1rem;
            padding: 12px 20px;
            border-radius: 10px;
            transition: background-color 0.2s ease, color 0.2s ease;
        }

        .navbar-nav .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.15);
            color: #ffffff;
        }

        .navbar-nav .nav-link.active {
            background-color: rgba(255, 255, 255, 0.25);
            font-weight: bold;
        }

        .navbar {
            height: 70px;
            font-weight: 500;
        }

        .navbar-brand {
            font-size: 2rem;
        }

        /* === MOBILE RESPONSIVE === */
        @media (max-width: 768px) {
            .sidebar {
                left: -280px;
                /* Hide sidebar off-screen */
                height: calc(100vh - 70px);
                border-right: 1px solid #dee2e6;
                padding: 1rem;
                width: 280px;
                overflow-y: auto;
                transition: left 0.3s ease;
            }

            .sidebar.collapsed {
                left: -280px;
                /* still hidden */
            }

            .sidebar.expanded {
                left: 0;
                /* slide in */
            }

            .content {
                margin-left: 0;
                padding: 1.5rem;
                transition: margin-left 0.3s ease;
            }

            /* Dark overlay when sidebar is open */
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

    <!-- Sidebar Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('sidebarToggle');
            const sidebar = document.querySelector('.sidebar');
            const content = document.querySelector('.content');
            const body = document.body;

            toggleBtn.addEventListener('click', function() {
                if (window.innerWidth <= 768) {
                    // Mobile: slide sidebar in/out
                    sidebar.classList.toggle('expanded');
                    body.classList.toggle('sidebar-open');
                } else {
                    // Desktop: collapse sidebar width
                    sidebar.classList.toggle('collapsed');
                    content.classList.toggle('expanded');
                }
            });

            // Close sidebar on clicking outside (mobile only)
            document.addEventListener('click', function(e) {
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
