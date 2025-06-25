<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;

class ApiAbsensiController extends Controller
{
    public function store(Request $request)
    {
        $today = now()->toDateString();
        $nama = $request->input('nama');

        // Cegah duplikat absensi di hari yang sama
        $sudahAbsen = Absensi::where('nama', $nama)->where('tanggal', $today)->exists();

        if ($sudahAbsen) {
            return response()->json(['message' => 'Sudah absen hari ini'], 200);
        }

        Absensi::create([
            'nama' => $nama,
            'jam_masuk' => now()->format('H:i:s'),
            'tanggal' => $today,
            'status' => 'Hadir'
        ]);
        

        return response()->json(['message' => 'Absensi berhasil dicatat.'], 201);
    }
    
}
