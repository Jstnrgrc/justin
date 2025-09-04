<div class="sidebar">
    <h5 class="mb-4">Navigation</h5>
    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <a class="nav-link text-dark {{ request()->is('dashboard') ? 'active' : '' }}" href="/dashboard">🏠 Home</a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link text-dark {{ request()->is('users*') ? 'active' : '' }}" href="/users">ℹ️ Users</a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link text-dark {{ request()->is('services*') ? 'active' : '' }}" href="/services">🛠 Pets</a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link text-dark {{ request()->is('contact') ? 'active' : '' }}" href="/contact">📞 Phone</a>
        </li>
    </ul>
</div>
