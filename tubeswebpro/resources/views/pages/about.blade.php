@extends('layouts.app')

@section('title', 'About Us - FloodSense')

@section('content')
<section class="page-section container pt-5 mt-5 text-white" data-aos="fade-up">
    <h2 class="fw-bold mb-4">About Us</h2>
    <div class="list-group mt-3" data-aos="slide-up">
        <div class="list-group-item p-4 mb-3">
            <h5 class="mb-1">Tentang FloodSense</h5>
            <p class="mb-0">FloodSense adalah sistem monitoring banjir berbasis sensor air dan kamera yang dikembangkan untuk memantau kondisi banjir secara real-time.</p>
        </div>
        <div class="list-group-item p-4 mb-3">
            <h5 class="mb-1">Latar Belakang</h5>
            <p class="mb-0">Website ini dibuat sebagai bagian dari proyek Tugas Besar (TUBES) mahasiswa Telkom University untuk meningkatkan kewaspadaan terhadap bencana banjir.</p>
        </div>
        <div class="list-group-item p-4 mb-3">
            <h5 class="mb-1">Tujuan Sistem</h5>
            <ul class="mb-0">
                <li>Monitoring ketinggian air secara real-time</li>
                <li>Memberikan notifikasi kondisi darurat</li>
                <li>Mendukung proses evakuasi</li>
                <li>Menyediakan visual kondisi lapangan</li>
            </ul>
        </div>
        <div class="list-group-item p-4">
            <h5 class="mb-1">Tim Pengembang</h5>
            <p class="mb-0">Proyek ini dikembangkan oleh mahasiswa Telkom University sebagai bagian dari tugas akademik.</p>
        </div>
    </div>
</section>
@endsection
