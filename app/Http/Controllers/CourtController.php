<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lapangan;

class CourtController extends Controller
{
    public function search(Request $request)
    {
        $lokasi = $request->input('lokasi');
        $tanggal = $request->input('tanggal');
        $waktu = $request->input('waktu');

        $lapangans = Lapangan::all();

        return view('lapangan', compact(
            'lapangans',
            'lokasi',
            'tanggal',
            'waktu'
        ));
    }
}