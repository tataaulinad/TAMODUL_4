@extends('layouts.app')

@section('title', 'Beranda - FloodSense')

@section('content')
<section class="pt-5 mt-5">
    <div class="container py-4 text-white">
        <div class="row align-items-center g-4 glass-card p-4 p-md-5">
            <div class="col-lg-6">
                <p class="text-uppercase fw-semibold opacity-75 mb-2">FloodSense</p>
                <h1 class="display-5 fw-bold">Pantau banjir secara real-time.</h1>
                <p class="lead mt-3">Lihat status air, notifikasi darurat, lokasi evakuasi, kamera lapangan, dan laporan warga dalam satu sistem.</p>
                <div class="d-flex gap-3 flex-wrap mt-4">
                    <a href="{{ route('laporan.index') }}" class="btn btn-light btn-lg fw-semibold">Kirim Laporan</a>
                    <a href="{{ route('peta') }}" class="btn btn-outline-light btn-lg fw-semibold">Buka Peta</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ratio ratio-16x9 rounded-4 overflow-hidden bg-white bg-opacity-10 d-flex align-items-center justify-content-center">
                    <div class="text-center p-4">
                        <div class="badge bg-light text-dark mb-3">Status demo</div>
                        <h3 class="fw-bold">Normal</h3>
                        <p class="mb-0">Ketinggian air 1.2 meter</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container pb-5 text-white">
    <div class="row g-4">
        <div class="col-md-4"><div class="card h-100 p-4"><h5>Peta Lokasi Banjir</h5><p class="mb-0">Pantau titik banjir real-time dengan visualisasi peta.</p></div></div>
        <div class="col-md-4"><div class="card h-100 p-4"><h5>Notifikasi Darurat</h5><p class="mb-0">Dapatkan alert langsung tentang perubahan status banjir.</p></div></div>
        <div class="col-md-4"><div class="card h-100 p-4"><h5>Laporan Warga</h5><p class="mb-0">Laporkan banjir di sekitar Anda dengan mudah.</p></div></div>
    </div>
</section>
@endsection
