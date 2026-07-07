<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        return view('kelas.index');
    }

    public function create()
    {
        return view('kelas.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('kelas.index');
    }
}