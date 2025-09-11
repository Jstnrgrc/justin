<div class="sidebar">
    <h5 class="mb-4 sidebar-title">Navigation</h5>
    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <a class="nav-link text-dark {{ request()->is('dashboard') ? 'active' : '' }}" href="/dashboard">
                <span class="icon">🏠</span>
                <span class="label">Home</span>
            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link text-dark {{ request()->is('users*') ? 'active' : '' }}" href="/users">
                <span class="icon">ℹ️</span>
                <span class="label">Users</span>
            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link text-dark {{ request()->is('services*') ? 'active' : '' }}" href="/services">
                <span class="icon">🛠</span>
                <span class="label">Pets</span>
            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link text-dark {{ request()->is('contact') ? 'active' : '' }}" href="/contact">
                <span class="icon">📞</span>
                <span class="label">Phone</span>
            </a>
        </li>
    </ul>
</div>
