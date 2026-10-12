
@extends('layouts.app')

@section('title', 'Laporan Warga - FloodSense')

@section('content')
<section class="page-section container pt-5 mt-5 text-white">
    <h2 class="fw-bold mb-4">Laporan Warga</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row g-4">
        <div class="col-lg-5">
            <form
                id="reportForm"
                action="{{ route('laporan.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf

                <div class="mb-3">
                    <label for="reporter_name" class="form-label">
                        Nama Pelapor
                    </label>
                    <input
                        type="text"
                        class="form-control"
                        id="reporter_name"
                        name="reporter_name"
                        value="{{ old('reporter_name') }}"
                    >
                </div>

                <div class="mb-3">
                    <label for="location" class="form-label">
                        Lokasi
                    </label>
                    <input
                        type="text"
                        class="form-control"
                        id="location"
                        name="location"
                        value="{{ old('location') }}"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="tinggi_genangan" class="form-label">
                        Tinggi Genangan (cm)
                    </label>
                    <input
                        type="number"
                        class="form-control"
                        id="tinggi_genangan"
                        name="tinggi_genangan"
                        min="10"
                        max="150"
                        value="{{ old('tinggi_genangan') }}"
                        required
                    >
                    <small class="text-white-50">
                        Masukkan tinggi genangan antara 10–150 cm.
                    </small>
                </div>

                <div class="mb-3">
                    <label for="tanggal_kejadian" class="form-label">
                        Tanggal Kejadian
                    </label>
                    <input
                        type="date"
                        class="form-control"
                        id="tanggal_kejadian"
                        name="tanggal_kejadian"
                        value="{{ old('tanggal_kejadian') }}"
                        max="{{ date('Y-m-d') }}"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label">
                        Unggah Foto
                    </label>
                    <input
                        type="file"
                        class="form-control"
                        id="photo"
                        name="photo"
                        accept="image/*"
                    >
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">
                        Deskripsi
                    </label>
                    <textarea
                        class="form-control"
                        id="description"
                        name="description"
                        rows="4"
                        required
                    >{{ old('description') }}</textarea>
                </div>

                <button
                    type="submit"
                    class="btn btn-light fw-semibold"
                >
                    Kirim Laporan
                </button>
            </form>
        </div>

        <div class="col-lg-7">
            <div class="glass-card p-4 h-100">
                <h5 class="mb-3">Daftar Laporan</h5>

                <div class="vstack gap-3">
                    @forelse ($reports as $report)
                        <div class="card p-3">
                            <div
                                class="d-flex justify-content-between flex-wrap gap-2"
                            >
                                <strong>
                                    {{ $report->location ?? 'Belum diisi' }}
                                </strong>

                                <span class="badge bg-secondary">
                                    {{ $report->status }}
                                </span>
                            </div>

                            <p class="mb-1 mt-2">
                                {{ $report->description }}
                            </p>

                            <p class="mb-1">
                                <strong>Nama Pelapor:</strong>
                                {{ $report->reporter_name ?? 'Warga' }}
                            </p>

                            <p class="mb-1">
                                <strong>Tinggi Genangan:</strong>
                                {{ $report->tinggi_genangan ?? '-' }}
                                @if ($report->tinggi_genangan !== null)
                                    cm
                                @endif
                            </p>

                            <p class="mb-1">
                                <strong>Tanggal Kejadian:</strong>
                                {{ $report->tanggal_kejadian
                                    ? $report->tanggal_kejadian->format('d-m-Y')
                                    : '-' }}
                            </p>

                            @if ($report->photo_path)
                                <p class="mb-1">
                                    <a
                                        href="{{ asset('storage/' . $report->photo_path) }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                    >
                                        Lihat Foto Laporan
                                    </a>
                                </p>
                            @endif

                            <small class="text-muted">
                                Dikirim:
                                {{ $report->created_at->format('d M Y, H:i') }}
                            </small>
                        </div>
                    @empty
                        <div class="text-white-50">
                            Belum ada laporan yang tersimpan.
                        </div>
                    @endforelse
                </div>

                <div class="mt-4">
                    {{ $reports->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
