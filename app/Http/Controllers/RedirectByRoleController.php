<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectByRoleController extends Controller
{
    public function __invoke(Request $request)
    {
        // 1. Ambil data user yang baru saja login
        $user = Auth::user();

        // 2. Cek kolom role di database Anda (pastikan nama kolomnya sesuai, misal: 'role')
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if ($user->role === 'customer') {
    return redirect()->route('welcome');
}
        // Jika tidak punya role, kembalikan ke halaman utama
        return redirect()->route('welcome');
    }
}