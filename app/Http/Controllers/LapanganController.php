<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LapanganController extends Controller
{
    public function show($id)
    {
        $lapangan = [
            1 => [
                'nama' => 'Lapangan Futsal Vinyl',
                'lokasi' => 'Bandung',
                'harga' => 'Rp 100.000/jam',
                'gambar' => 'https://i.pinimg.com/736x/84/83/f5/8483f555f7128a38448d2cb2fb50b31d.jpg',
                'deskripsi' => 'Lapangan indoor dengan lantai vinyl berkualitas.'
            ],
            2 => [
                'nama' => 'Lapangan Futsal Rumput',
                'lokasi' => 'Bandung',
                'harga' => 'Rp 120.000/jam',
                'gambar' => 'https://i.pinimg.com/736x/7e/ec/a5/7eeca5873ee1850f682aaa0c6e55b9ea.jpg',
                'deskripsi' => 'Lapangan rumput sintetis yang nyaman digunakan.'
            ],
            3 => [
                'nama' => 'Lapangan Futsal Traflex',
                'lokasi' => 'Bandung',
                'harga' => 'Rp 120.000/jam',
                'gambar' => 'https://i.pinimg.com/736x/a7/04/53/a704534b6aa2389472fe3fe749435112.jpg',
                'deskripsi' => 'Lapangan standar nasional dengan lantai traflex.'
            ],
        ];

        return view('lapangan.detail', [
            'lapangan' => $lapangan[$id]
        ]);
    }
}