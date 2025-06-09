@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-semibold mb-6">Laporan Kehadiran Karyawan</h1>

<div class="mb-6">
    <form class="max-w-md flex space-x-4" method="GET" action="#">
        <input type="date" name="tanggal" class="border border-gray-300 rounded px-3 py-2 flex-grow" />
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            Filter
        </button>
    </form>
</div>

<table class="w-full border border-gray-300 rounded-md">
    <thead class="bg-blue-200">
        <tr>
            <th class="border border-gray-300 p-2 text-left">Nama</th>
            <th class="border border-gray-300 p-2 text-left">Status</th>
            <th class="border border-gray-300 p-2 text-left">Jam Masuk</th>
            <th class="border border-gray-300 p-2 text-left">Jam Pulang</th>
            <th class="border border-gray-300 p-2 text-left">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border border-gray-300 p-2">Budi Santoso</td>
            <td class="border border-gray-300 p-2 text-green-600 font-semibold">Hadir</td>
            <td class="border border-gray-300 p-2">08:05</td>
            <td class="border border-gray-300 p-2">17:00</td>
            <td class="border border-gray-300 p-2">-</td>
        </tr>
        <tr>
            <td class="border border-gray-300 p-2">Siti Aminah</td>
            <td class="border border-gray-300 p-2 text-yellow-600 font-semibold">Terlambat</td>
            <td class="border border-gray-300 p-2">08:45</td>
            <td class="border border-gray-300 p-2">17:00</td>
            <td class="border border-gray-300 p-2">-</td>
        </tr>
        <tr>
            <td class="border border-gray-300 p-2">Joko Susilo</td>
            <td class="border border-gray-300 p-2 text-red-600 font-semibold">Tidak Hadir</td>
            <td class="border border-gray-300 p-2">-</td>
            <td class="border border-gray-300 p-2">-</td>
            <td class="border border-gray-300 p-2">Cuti</td>
        </tr>
        <!-- Data lain bisa ditambah -->
    </tbody>
</table>

<div class="mt-6">
    <button
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition"
        onclick="alert('Fitur download laporan belum diimplementasi')"
    >
        Download Laporan (Excel/Word)
    </button>
</div>
@endsection
