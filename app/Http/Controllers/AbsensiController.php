<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Izin;

class AbsensiController extends Controller
{
    public function scan() {
        $role = 'karyawan';  // Role karyawan untuk halaman scan
        return view('pages.scan', compact('role'));
    }

    public function dashboard() {
        $role = 'hrd';       // Role HRD untuk dashboard
        $izins = Izin::all();
        return view('pages.dashboard', compact('role', 'izins'));
    }

    public function cuti() {
        $role = 'karyawan';  // Role karyawan untuk halaman cuti
        return view('pages.cuti', compact('role'));
    }

    public function laporan() {
        $role = 'hrd';       // Role HRD untuk laporan
        return view('pages.laporan', compact('role'));
    }

    public function admin() {
        $role = 'hrd';       // Role HRD untuk admin
        return view('pages.admin', compact('role'));
    }
}
