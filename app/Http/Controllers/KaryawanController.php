<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string',
        'nik' => 'required|string|unique:karyawans,nik',
        'jabatan' => 'required|string',
        'email' => 'required|email|unique:karyawans,email',
        'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        'wajah.*' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Simpan foto profil
    $fotoPath = null;
    if ($request->hasFile('foto')) {
        $foto = $request->file('foto');
        $fotoName = time() . '_' . $foto->getClientOriginalName();
        $foto->move(public_path('uploads/profil'), $fotoName);
        $fotoPath = 'uploads/profil/' . $fotoName;
    }

    // Simpan ke DB
    $karyawan = Karyawan::create([
        'nama' => $request->nama,
        'nik' => $request->nik,
        'jabatan' => $request->jabatan,
        'email' => $request->email,
        'foto' => $fotoPath,
    ]);

    // Simpan folder wajah untuk face recognition
    $folderPath = public_path('face-data/' . $karyawan->nama);
    if (!file_exists($folderPath)) {
        mkdir($folderPath, 0777, true);
    }

    $i = 1;
    foreach ($request->file('wajah') as $image) {
        $image->move($folderPath, $i . '.jpg');
        $i++;
    }

    return redirect()->back()->with('success', 'Karyawan dan foto berhasil disimpan.');
}
}