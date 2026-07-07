<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Lapangan;
use Illuminate\Http\Request;

class UserBookingController extends Controller
{
    public function index()
    {
        $lapangans = Lapangan::where('status', 'active')->latest()->get();

        return view('user.booking', compact('lapangans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lapangan_id' => 'required|exists:lapangans,id',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'total_harga' => 'required|numeric|min:0',
            'durasi' => 'nullable|numeric',
        ]);

        // Basic time validation
        if ($request->jam_selesai <= $request->jam_mulai) {
            return back()->withErrors(['jam_selesai' => 'Jam selesai harus lebih besar dari jam mulai.'])->withInput();
        }

        Booking::create([
            'user_id' => $request->user()->id,
            'lapangan_id' => $request->lapangan_id,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'total_harga' => $request->total_harga,
            'status' => 'Pending',
        ]);

        return redirect()->route('user.bookings.riwayat')->with('success', 'Booking berhasil dikirim (Pending)');
    }

    public function riwayat()
    {
        $bookings = Booking::with(['lapangan'])
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('user.riwayat', compact('bookings'));
    }
}

