<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourtController extends Controller
{
    public function search(Request $request)
    {
        // Mengambil data inputan dari form pencarian di front-end
        $lokasi = $request->input('lokasi');
        $tanggal = $request->input('tanggal');
        $waktu = $request->input('waktu');

        // Mengirim data ke halaman view bernama 'lapangan'
        return view('lapangan', compact('lokasi', 'tanggal', 'waktu'));
    }
}