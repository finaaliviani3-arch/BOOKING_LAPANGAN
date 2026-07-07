<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminLapanganController extends Controller
{
    public function index()
    {
        $lapangans = Lapangan::latest()->paginate(10);
        return view('admin.lapangan.index', compact('lapangans'));
    }

    public function create()
    {
        return view('admin.lapangan.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'lokasi' => 'nullable|string|max:255',
            'harga' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
            'fasilitas' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'gambar' => 'required|image|max:5120',
        ]);

        $data['gambar'] = $request->file('gambar')->store('lapangan', 'public');

        // simpan fasilitas/deskripsi sebagai string seperti yang diakses view
        $data['fasilitas'] = $data['fasilitas'] ?? null;
        $lapangan = Lapangan::create([
            'nama' => $data['nama'],
            'lokasi' => $data['lokasi'],
            'harga' => $data['harga'],
            'status' => $data['status'],
            'fasilitas' => $data['fasilitas'],
            'deskripsi' => $data['deskripsi'],
            'gambar' => $data['gambar'],
        ]);

        return redirect()->route('admin.lapangans.index')->with('success', 'Lapangan berhasil dibuat');
    }

    public function edit(Lapangan $lapangan)
    {
        return view('admin.lapangan.edit', compact('lapangan'));
    }

    public function update(Request $request, Lapangan $lapangan)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'lokasi' => 'nullable|string|max:255',
            'harga' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
            'fasilitas' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|max:5120',
        ]);

        $updatePayload = [
            'nama' => $data['nama'],
            'lokasi' => $data['lokasi'],
            'harga' => $data['harga'],
            'status' => $data['status'],
            'fasilitas' => $data['fasilitas'] ?? null,
            'deskripsi' => $data['deskripsi'] ?? null,
        ];

        if ($request->hasFile('gambar')) {
            // delete old if exists
            if ($lapangan->gambar) {
                Storage::disk('public')->delete($lapangan->gambar);
            }
            $updatePayload['gambar'] = $request->file('gambar')->store('lapangan', 'public');
        }

        $lapangan->update($updatePayload);

        return redirect()->route('admin.lapangans.index')->with('success', 'Lapangan berhasil diperbarui');
    }

    public function destroy(Lapangan $lapangan)
    {
        if ($lapangan->gambar) {
            Storage::disk('public')->delete($lapangan->gambar);
        }

        $lapangan->delete();

        return redirect()->route('admin.lapangans.index')->with('success', 'Lapangan berhasil dihapus');
    }
}

