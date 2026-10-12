@php
    $links = [
        ['label' => 'Beranda', 'route' => 'beranda'],
        ['label' => 'Notifikasi', 'route' => 'notifikasi'],
        ['label' => 'Berita', 'route' => 'berita'],
        ['label' => 'Peta', 'route' => 'peta'],
        ['label' => 'Kamera', 'route' => 'kamera'],
        ['label' => 'Laporan', 'route' => 'laporan.index'],
        ['label' => 'Evakuasi', 'route' => 'evakuasi'],
        ['label' => 'About Us', 'route' => 'about'],
    ];
@endphp

<nav class="navbar navbar-expand-lg navbar-dark fixed-top app-navbar">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('welcome') }}">FloodSense</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                @foreach ($links as $link)
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs($link['route']) ? 'active' : '' }}" href="{{ route($link['route']) }}">{{ $link['label'] }}</a>
                    </li>
                @endforeach
                @auth
                    @if (auth()->user()?->isAdmin())
                        <li class="nav-item dropdown me-lg-1">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Admin
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.statistik') }}">Admin Statistik</a></li>
                            </ul>
                        </li>
                    @endif
                    <li class="nav-item ms-lg-2">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-light fw-semibold px-3">Keluar</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item ms-lg-2">
                        <a class="btn btn-sm btn-outline-light fw-semibold px-3 me-2" href="{{ route('register') }}">Daftar</a>
                        <a class="btn btn-sm btn-light fw-semibold px-3" href="{{ route('login') }}">Masuk</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
