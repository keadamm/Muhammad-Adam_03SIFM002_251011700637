<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function index()
    {
        $mahasiswa = [
            'nama' => 'Muhammad Adam',
            'status' => 'Mahasiswa Aktif',
            'nim' => '251011700637',
            'email' => 'keadamm9@gmail.com',
            'prodi' => 'Sistem Informasi',
        ];

        return view('mahasiswa', compact('mahasiswa'));
    }
}