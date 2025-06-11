<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Karyawan;
use Carbon\Carbon;

class AbsensiApiController extends Controller
{
    public function store(Request $request)
    {
        $karyawan = Karyawan::where('nama', $request->nama)->first();
        if (!$karyawan) return response()->json(['error' => 'Karyawan tidak ditemukan'], 404);

        $tanggal = Carbon::today();
        $waktuSekarang = Carbon::now();

        // Cek apakah sudah absen hari ini
        $absen = Absensi::firstOrNew([
            'karyawan_id' => $karyawan->id,
            'tanggal' => $tanggal,
        ]);

        if (!$absen->exists) {
            $absen->jam_masuk = $waktuSekarang;
            $absen->status = $waktuSekarang->format('H:i') > '08:30' ? 'terlambat' : 'hadir';
        } else {
            $absen->jam_pulang = $waktuSekarang;
        }

        $absen->save();

        return response()->json(['message' => 'Absen berhasil']);
    }
}