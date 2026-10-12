@extends('layouts.app')

@section('title', $title ?? 'Admin Statistik - FloodSense')

@section('content')
<section class="page-section container pt-5 mt-5 text-white">
    <div class="glass-card p-4 p-md-5">
        <h2 class="fw-bold mb-2">Statistik Banjir</h2>
        <p class="mb-4 opacity-75">Grafik tren ketinggian air untuk pengambilan keputusan cepat.</p>
        <canvas id="floodChart" height="110"></canvas>
    </div>
</section>
@endsection
