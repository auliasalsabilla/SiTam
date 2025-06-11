<?php

// app/Http/Controllers/IzinController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Izin;

class IzinController extends Controller
{
    public function index()
    {
        $izins = Izin::latest()->get();
        return view('dashboard', compact('izins'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_izin' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'keterangan' => 'nullable|string',
        ]);

        izin::create([
            'nama' => $request->nama,
            'jenis_izin' => $request->jenis_izin,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'keterangan' => $request->keterangan,
        ]);

        $role = $request->input('role');

        if ($role === 'hrd') {
            return redirect()->route('dashboard')->with('success', 'Data izin berhasil disimpan.');
        } else {
            return redirect()->route('cuti')->with('success', 'Pengajuan izin berhasil dikirim.');
        }

        return redirect()->route('dashboard')->with('success', 'Pengajuan izin berhasil!');
    }
}

?>