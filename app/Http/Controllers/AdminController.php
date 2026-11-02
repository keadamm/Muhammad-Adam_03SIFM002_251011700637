<?php

namespace App\Http\Controllers;

use App\Models\Perangkat;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private const KATEGORI = ['Hardware', 'Software', 'Periferal'];

    public function index()
    {
        $perangkat = Perangkat::orderBy('id')->get();

        return view('admin.admin', compact('perangkat'));
    }

    public function create()
    {
        return view('admin.form', [
            'perangkat' => new Perangkat(),
            'kategoriList' => self::KATEGORI,
        ]);
    }

    public function store(Request $request)
    {
        Perangkat::create($this->validasi($request));

        return redirect()->route('admin.index')->with('sukses', 'Data berhasil ditambahkan.');
    }

    public function edit(Perangkat $perangkat)
    {
        return view('admin.form', [
            'perangkat' => $perangkat,
            'kategoriList' => self::KATEGORI,
        ]);
    }

    public function update(Request $request, Perangkat $perangkat)
    {
        $perangkat->update($this->validasi($request));

        return redirect()->route('admin.index')->with('sukses', 'Data berhasil diubah.');
    }

    public function destroy(Perangkat $perangkat)
    {
        $nama = $perangkat->nama;
        $perangkat->delete();

        return redirect()->route('admin.index')->with('sukses', "Data \"{$nama}\" berhasil dihapus.");
    }

    private function validasi(Request $request): array
    {
        return $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'kategori' => ['required', 'in:' . implode(',', self::KATEGORI)],
            'deskripsi' => ['required', 'string'],
            'spesifikasi' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
            'gambar' => ['nullable', 'url', 'max:500'],
        ], [
            'required' => ':attribute wajib diisi.',
            'max' => ':attribute maksimal :max karakter.',
            'url' => ':attribute harus berupa link (diawali http:// atau https://).',
            'in' => ':attribute tidak valid.',
        ], [
            'nama' => 'Nama perangkat',
            'kategori' => 'Kategori',
            'deskripsi' => 'Deskripsi',
            'spesifikasi' => 'Spesifikasi',
            'status' => 'Status',
            'gambar' => 'Link gambar',
        ]);
    }
}