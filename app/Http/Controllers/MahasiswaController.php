<?php

namespace App\Http\Controllers;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = [
            'nama' => 'Muhammad Adam',
            'nim' => '251011700637',
            'email' => 'keadamm9@gmail.com',
            'prodi' => 'Sistem Informasi',
            'status' => 'Aktif'
        ];

        return view('mahasiswa', compact('mahasiswa'));
    }
}