<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Lapangan;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::with(['user', 'lapangan'])->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        $bookings = $query->paginate(15);

        return view('admin.booking.index', compact('bookings'));
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        $data = $request->validate([
            'status' => 'required|in:Pending,Disetujui,Ditolak,Selesai',
        ]);

        $booking->update(['status' => $data['status']]);

        return redirect()->route('admin.bookings.index')->with('success', 'Status booking berhasil diperbarui');
    }
}

