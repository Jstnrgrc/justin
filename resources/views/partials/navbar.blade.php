<nav class="navbar navbar-dark bg-dark fixed-top px-4" style="height: 70px;">
    <div class="d-flex align-items-center">
        <!-- Sidebar toggle button -->
        <button id="sidebarToggle" class="btn btn-outline-light me-3" type="button" aria-label="Toggle sidebar">
            &#9776;
        </button>

        <!-- Brand -->
        <a class="navbar-brand me-4 mb-0" href="/">LaravelBook</a>
    </div>

    <!-- Navigation links -->
    <ul class="navbar-nav flex-row mb-0 d-none d-md-flex">
        <li class="nav-item mx-2"><a class="nav-link text-white" href="/">Home</a></li>
        <li class="nav-item mx-2"><a class="nav-link text-white" href="/about">About</a></li>
        <li class="nav-item mx-2"><a class="nav-link text-white" href="/services">Services</a></li>
        <li class="nav-item mx-2"><a class="nav-link text-white" href="/contact">Contact</a></li>
         <li class="nav-item mx-2">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-light">Logout</button>
            </form>
        </li>
    </ul>
</nav>
