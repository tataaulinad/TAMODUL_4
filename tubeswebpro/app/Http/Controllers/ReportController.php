<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //Menampilkan Data Laporan
    public function index()
    {
        $reports = Report::latest()->paginate(8);
        return \view('pages.laporan', compact('reports'));
    }
    public function store(Request $request)
    {   
    $validated = $request->validate([
    'reporter_name' => ['nullable', 'string', 'max:120'],
    'location' => ['nullable', 'string', 'max:120'],
    'description' => ['required', 'string', 'min:10'],
    'photo' => ['nullable', 'image', 'max:4096'],
    'tinggi_genangan' => ['required', 'integer', 'min:10', 'max:150'],
    'tanggal_kejadian' => ['required', 'date', 'before_or_equal:today'],
]);
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('reports', 'public');
        }
        Report::create([
            'reporter_name' => $validated['reporter_name'] ?? 'Warga',
            'location' => $validated['location'] ?? 'Belum diisi',
            'description' => $validated['description'],
            'photo_path' => $photoPath,
            'status' => 'Baru',
            'tinggi_genangan' => $validated['tinggi_genangan'],
            'tanggal_kejadian' => $validated['tanggal_kejadian'],
        ]);

        return \redirect()->route('laporan.index')->with('success', 'Laporan berhasil dikirim.');
    }
}
