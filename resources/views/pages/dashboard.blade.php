@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-semibold mb-6">Dashboard Monitoring Kehadiran</h1>

<div class="grid grid-cols-3 gap-4 mb-6">
    <div class="bg-white p-4 rounded shadow text-center">
        <h2 class="text-xl font-bold">{{ $jumlahHadir }}</h2>
        <p>Hadir</p>
    </div>
    <div class="bg-white p-4 rounded shadow text-center">
        <h2 class="text-xl font-bold">{{ $jumlahTerlambat }}</h2>
        <p>Terlambat</p>
    </div>
    <div class="bg-white p-4 rounded shadow text-center">
        <h2 class="text-xl font-bold">{{ $jumlahTidakHadir }}</h2>
        <p>Tidak Hadir</p>
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
            @foreach ($izins as $izin)
                <tr>
                    <td class="border border-gray-300 p-2">{{ $izin->nama }}</td>
                    <td class="border border-gray-300 p-2">{{ ucfirst(str_replace('_', ' ', $izin->jenis_izin)) }}</td>
                    <td class="border border-gray-300 p-2">{{ $izin->tanggal_mulai }} s/d {{ $izin->tanggal_selesai }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

