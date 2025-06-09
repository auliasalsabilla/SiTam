@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-semibold">Data Karyawan</h1>
    <button
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition"
        onclick="alert('Form tambah karyawan belum dibuat!')"
    >
        + Tambah Data Karyawan
    </button>
</div>

<table class="w-full border border-gray-300 rounded-md">
    <thead class="bg-blue-200">
        <tr>
            <th class="border border-gray-300 p-2 text-left">Foto</th>
            <th class="border border-gray-300 p-2 text-left">ID</th>
            <th class="border border-gray-300 p-2 text-left">Nama</th>
            <th class="border border-gray-300 p-2 text-left">Jabatan</th>
            <th class="border border-gray-300 p-2 text-left">Email</th>
            <th class="border border-gray-300 p-2 text-left">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border border-gray-300 p-2">
                <img src="{{ asset('storage/foto_karyawan/budi.jpg') }}" alt="Budi Santoso" class="w-16 h-16 rounded object-cover">
            </td>
            <td class="border border-gray-300 p-2">001</td>
            <td class="border border-gray-300 p-2">Budi Santoso</td>
            <td class="border border-gray-300 p-2">Manager</td>
            <td class="border border-gray-300 p-2">budi@example.com</td>
            <td class="border border-gray-300 p-2">
                <button class="text-blue-600 underline" onclick="alert('Form upload foto belum dibuat!')">Upload Foto</button>
            </td>
        </tr>
        <tr>
            <td class="border border-gray-300 p-2">
                <img src="{{ asset('storage/foto_karyawan/siti.jpg') }}" alt="Siti Aminah" class="w-16 h-16 rounded object-cover">
            </td>
            <td class="border border-gray-300 p-2">002</td>
            <td class="border border-gray-300 p-2">Siti Aminah</td>
            <td class="border border-gray-300 p-2">HRD</td>
            <td class="border border-gray-300 p-2">siti@example.com</td>
            <td class="border border-gray-300 p-2">
                <button class="text-blue-600 underline" onclick="alert('Form upload foto belum dibuat!')">Upload Foto</button>
            </td>
        </tr>
    </tbody>
</table>
@endsection
