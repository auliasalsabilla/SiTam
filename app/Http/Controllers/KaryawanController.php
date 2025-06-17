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
    ]);

    Karyawan::create([
        'nama' => $request->nama,
        'jabatan' => $request->jabatan,
        'email' => $request->email,
    ]);

    return redirect()->back()->with('success', 'Karyawan berhasil ditambahkan.');
}


}