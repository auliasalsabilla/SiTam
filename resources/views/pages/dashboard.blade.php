@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-semibold mb-6">Dashboard Monitoring Kehadiran</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded shadow p-6">
        <h2 class="text-xl font-semibold mb-2">Karyawan Hadir</h2>
        <p class="text-3xl font-bold text-green-600">35</p>
    </div>
    <div class="bg-white rounded shadow p-6">
        <h2 class="text-xl font-semibold mb-2">Karyawan Terlambat</h2>
        <p class="text-3xl font-bold text-yellow-500">5</p>
    </div>
    <div class="bg-white rounded shadow p-6">
        <h2 class="text-xl font-semibold mb-2">Karyawan Tidak Hadir</h2>
        <p class="text-3xl font-bold text-red-500">10</p>
    </div>
</div>

<div class="bg-white rounded shadow p-6">
    <h2 class="text-xl font-semibold mb-4">Daftar Izin / Cuti Hari Ini</h2>
    <table class="w-full border border-gray-300 rounded-md">
        <thead class="bg-blue-200">
            <tr>
                <th class="border border-gray-300 p-2 text-left">Nama</th>
                <th class="border border-gray-300 p-2 text-left">Jenis Izin/Cuti</th>
                <th class="border border-gray-300 p-2 text-left">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border border-gray-300 p-2">Siti Aminah</td>
                <td class="border border-gray-300 p-2">Cuti Tahunan</td>
                <td class="border border-gray-300 p-2">2025-06-09</td>
            </tr>
            <tr>
                <td class="border border-gray-300 p-2">Joko Susilo</td>
                <td class="border border-gray-300 p-2">Izin Sakit</td>
                <td class="border border-gray-300 p-2">2025-06-09</td>
            </tr>
            <!-- Tambah data lain -->
        </tbody>
    </table>
</div>
@endsection

