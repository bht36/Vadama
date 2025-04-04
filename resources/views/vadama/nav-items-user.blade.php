<li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
    <a href="{{ route('dashboard') }}" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Dashboard</p>
    </a>
</li>

<li class="nav-item <?= @$child_nav == 'dashboard' ? 'active bg-gray' : '' ?>">
    <a href="{{ route('dashboard') }}" class="nav-link">
        <i class="far fa-regular fa-image nav-icon"></i>
        <p>{{ __('Dashboard') }}</p>
    </a>
</li>

<li class="nav-item {{ request()->is('user/lease-property') ? 'active' : '' }}">
    <a href="" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p>Lease Property</p>
    </a>
</li>

<li class="nav-item {{ request()->is('user/applied-property') ? 'active' : '' }}">
    <a href="" class="nav-link">
        <i class="nav-icon fas fa-handshake"></i>
        <p>Applied Property</p>
    </a>
</li>