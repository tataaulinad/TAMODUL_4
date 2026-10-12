@extends('layouts.app')

@section('title', $title ?? 'FloodSense')

@section('content')
<section class="page-section container pt-5 mt-5 text-white">
    <div class="glass-card p-4 p-md-5">
        <h2 class="fw-bold mb-2">{{ $heading ?? 'FloodSense' }}</h2>
        <p class="mb-4 opacity-75">{{ $lead ?? '' }}</p>

        @if (($variant ?? '') === 'notifications')
            <div class="vstack gap-3" id="notifications">
                @foreach ($items ?? [] as $item)
                    <div class="alert alert-{{ $item['type'] }} mb-0" role="alert">
                        {{ $item['message'] }} <small class="text-muted ms-2">{{ $item['time'] }}</small>
                    </div>
                @endforeach
            </div>
        @elseif (($variant ?? '') === 'cards')
            <div class="row g-4">
                @foreach ($items ?? [] as $item)
                    <div class="col-md-4">
                        <div class="card h-100 p-4">
                            <h5>{{ $item['title'] }}</h5>
                            <p class="mb-0">{{ $item['text'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @elseif (($variant ?? '') === 'map')
            <div id="map" style="height: 520px;"></div>
            <p class="mt-3 mb-0 small opacity-75">Jika peta kosong, biasanya koneksi CDN Leaflet sedang bermasalah.</p>
        @elseif (($variant ?? '') === 'camera')
            <div class="ratio ratio-16x9 rounded-4 overflow-hidden bg-dark mb-3">
                <video id="cameraStream" autoplay muted playsinline class="w-100 h-100 object-fit-cover"></video>
            </div>
            <button type="button" class="btn btn-light fw-semibold" onclick="captureSnapshot()">Ambil Snapshot</button>
        @elseif (($variant ?? '') === 'login')
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form class="glass-card p-4" method="POST" action="{{ route('login.store') }}">
                        @csrf
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first() }}
                            </div>
                        @endif
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="nama@email.com" value="{{ old('email') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="remember" value="1" id="remember">
                            <label class="form-check-label" for="remember">Ingat saya</label>
                        </div>
                        <button type="submit" class="btn btn-light fw-semibold">Masuk</button>
                        <p class="mt-3 mb-0 small opacity-75">Belum punya akun? <a href="{{ route('register') }}" class="text-white fw-semibold">Daftar di sini</a></p>
                        <p class="mb-0 small opacity-75">Akun demo: admin@floodsense.test / password</p>
                    </form>
                </div>
            </div>
        @elseif (($variant ?? '') === 'register')
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form class="glass-card p-4" method="POST" action="{{ route('register.store') }}">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first() }}
                            </div>
                        @endif
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control" placeholder="Nama lengkap" value="{{ old('name') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="nama@email.com" value="{{ old('email') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Minimal 8 karakter" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ulangi Password</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password" required>
                        </div>
                        <button type="submit" class="btn btn-light fw-semibold">Daftar</button>
                        <p class="mt-3 mb-0 small opacity-75">Sudah punya akun? <a href="{{ route('login') }}" class="text-white fw-semibold">Login</a></p>
                    </form>
                </div>
            </div>
        @elseif (($variant ?? '') === 'dashboard')
            <div class="row g-4">
                <div class="col-md-4"><div class="status-card p-4"><h5>Status Air</h5><p class="mb-0">Normal - 1.2 m</p></div></div>
                <div class="col-md-4"><div class="status-card p-4"><h5>Notifikasi</h5><p class="mb-0">2 notifikasi aktif</p></div></div>
                <div class="col-md-4"><div class="status-card p-4"><h5>Laporan Masuk</h5><p class="mb-0">1 laporan baru</p></div></div>
            </div>
        @elseif (($variant ?? '') === 'chart')
            <canvas id="floodChart" height="110"></canvas>
        @else
            <p class="mb-0">Halaman ini sedang disiapkan untuk migrasi ke Laravel.</p>
        @endif
    </div>
</section>
@endsection
