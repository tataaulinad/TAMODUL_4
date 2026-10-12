@extends('layouts.app')

@section('title', $title ?? 'Admin Dashboard - FloodSense')

@section('content')
<section class="page-section container pt-5 mt-5 text-white">
    <div class="glass-card p-4 p-md-5">
        <h2 class="fw-bold mb-2">Admin Dashboard</h2>
        <p class="mb-4 opacity-75">Kontrol ringkas untuk memantau laporan, sensor, dan aktivitas sistem.</p>

        <div class="row g-4">
            <div class="col-md-4"><div class="status-card p-4"><h5>Laporan Baru</h5><p class="mb-0">0 item menunggu validasi</p></div></div>
            <div class="col-md-4"><div class="status-card p-4"><h5>Sensor Aktif</h5><p class="mb-0">3 titik pantau aktif</p></div></div>
            <div class="col-md-4"><div class="status-card p-4"><h5>Notifikasi Terkirim</h5><p class="mb-0">2 notifikasi terkirim</p></div></div>
        </div>
    </div>
</section>
@endsection
