<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function welcome()
    {
        return \view('welcome');
    }

    public function beranda()
    {
        return \view('pages.beranda');
    }

    public function about()
    {
        return \view('pages.about');
    }

    public function notifikasi()
    {
        return \view('pages.simple', [
            'title' => 'Notifikasi - FloodSense',
            'heading' => 'Notifikasi Darurat',
            'lead' => 'Daftar alert real-time untuk kondisi banjir dan cuaca ekstrem.',
            'variant' => 'notifications',
            'items' => [
                ['type' => 'warning', 'message' => 'Hujan sedang turun di daerah A.', 'time' => '10:00 AM'],
                ['type' => 'danger', 'message' => 'Status air berubah ke Siaga di Sungai B.', 'time' => '11:30 AM'],
            ],
        ]);
    }

    public function berita()
    {
        return \view('pages.simple', [
            'title' => 'Berita - FloodSense',
            'heading' => 'Berita Terkini',
            'lead' => 'Ringkasan informasi penting terkait kondisi banjir dan keselamatan warga.',
            'variant' => 'cards',
            'items' => [
                ['title' => 'Pemantauan debit air meningkat', 'text' => 'Petugas mulai meningkatkan status siaga di beberapa titik rawan.'],
                ['title' => 'Warga diminta tetap waspada', 'text' => 'Imbauan untuk memindahkan barang penting ke tempat yang lebih tinggi.'],
                ['title' => 'Posko darurat disiapkan', 'text' => 'Pemerintah menyiapkan jalur evakuasi dan bantuan logistik.'],
            ],
        ]);
    }

    public function peta()
    {
        return \view('pages.simple', [
            'title' => 'Peta - FloodSense',
            'heading' => 'Peta Lokasi Banjir',
            'lead' => 'Visualisasi lokasi sensor dan titik rawan menggunakan peta interaktif.',
            'variant' => 'map',
        ]);
    }

    public function kamera()
    {
        return \view('pages.simple', [
            'title' => 'Kamera - FloodSense',
            'heading' => 'Live Camera',
            'lead' => 'Tampilan kamera untuk memantau kondisi lapangan secara langsung.',
            'variant' => 'camera',
        ]);
    }

    public function evakuasi()
    {
        return \view('pages.simple', [
            'title' => 'Evakuasi - FloodSense',
            'heading' => 'Rute Evakuasi',
            'lead' => 'Daftar titik aman dan lokasi evakuasi terdekat.',
            'variant' => 'cards',
            'items' => [
                ['title' => 'Posko Utama A', 'text' => 'Jl. Merdeka No. 10 - kapasitas 200 orang.'],
                ['title' => 'Gedung Serbaguna B', 'text' => 'Jl. Melati No. 25 - dekat dengan jalur utama.'],
                ['title' => 'Sekolah Aman C', 'text' => 'Jl. Kenanga No. 8 - tersedia logistik dasar.'],
            ],
        ]);
    }

    public function login()
    {
        return \view('pages.simple', [
            'title' => 'Login - FloodSense',
            'heading' => 'Masuk ke Sistem',
            'lead' => 'Form login awal untuk warga atau admin sebelum masuk ke dashboard.',
            'variant' => 'login',
        ]);
    }

    public function register()
    {
        return \view('pages.simple', [
            'title' => 'Register - FloodSense',
            'heading' => 'Daftar Akun',
            'lead' => 'Buat akun dulu supaya data tersimpan di database lalu bisa login.',
            'variant' => 'register',
        ]);
    }

    public function dashboard()
    {
        if (! auth()->check()) {
            return redirect()->route('login');
        }

        return \view('pages.simple', [
            'title' => 'Dashboard - FloodSense',
            'heading' => 'Dashboard Pengguna',
            'lead' => 'Ringkasan status air, notifikasi, dan akses cepat ke fitur utama.',
            'variant' => 'dashboard',
        ]);
    }

    public function adminDashboard()
    {
        if (! auth()->check()) {
            return redirect()->route('login');
        }

        if (! auth()->user()?->isAdmin()) {
            return redirect()->route('dashboard');
        }

        return \view('admin.dashboard', [
            'title' => 'Admin Dashboard - FloodSense',
        ]);
    }

    public function adminStatistik()
    {
        if (! auth()->check()) {
            return redirect()->route('login');
        }

        if (! auth()->user()?->isAdmin()) {
            return redirect()->route('dashboard');
        }

        return \view('admin.statistik', [
            'title' => 'Admin Statistik - FloodSense',
        ]);
    }
}
