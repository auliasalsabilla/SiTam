<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Izin;
use App\Models\Karyawan;
use App\Models\Absensi;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    public function scan() {
        $role = 'karyawan';  // Role karyawan untuk halaman scan
        return view('pages.scan', compact('role'));
    }

public function dashboard()
{
    $role = 'hrd';
    $tanggal = Carbon::today();

    $absensiHariIni = Absensi::where('tanggal', $tanggal)->get();
    $jumlahHadir = $absensiHariIni->where('status', 'hadir')->count();
    $jumlahTerlambat = $absensiHariIni->where('status', 'terlambat')->count();
    $jumlahTidakHadir = Karyawan::count() - $absensiHariIni->count();

    $izins = Izin::whereDate('tanggal_mulai', '<=', $tanggal)
                 ->whereDate('tanggal_selesai', '>=', $tanggal)
                 ->get();
    

    return view('pages.dashboard', compact('role', 'jumlahHadir', 'jumlahTerlambat', 'jumlahTidakHadir', 'izins'));
}


    public function cuti() {
        $role = 'karyawan';  // Role karyawan untuk halaman cuti
        return view('pages.cuti', compact('role'));
    }
    

    public function laporan()
{
    $role = 'hrd';
    return view('pages.laporan', compact('role'));
}

    public function admin()
{
    $role = 'hrd';
    $karyawans = Karyawan::all();
    return view('pages.admin', compact('role', 'karyawans'));
}

}
