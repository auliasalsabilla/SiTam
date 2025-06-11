@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-semibold">Data Karyawan</h1>
    <button
    onclick="document.getElementById('modalTambah').classList.remove('hidden')"
    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition"
>
    + Tambah Data Karyawan
</button>

</div>
@if (session('success'))
    <div class="bg-green-100 text-green-800 p-2 rounded mb-4">{{ session('success') }}</div>
@endif

<div id="modalTambah" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6 relative">
        <button onclick="document.getElementById('modalTambah').classList.add('hidden')" class="absolute top-2 right-2 text-gray-500 hover:text-red-600 text-xl">&times;</button>
        <h2 class="text-xl font-semibold mb-4">Tambah Data Karyawan</h2>
        <form method="POST" action="{{ route('karyawan.store') }}" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label class="block font-semibold">Nama</label>
                <input type="text" name="nama" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="block font-semibold">Jabatan</label>
                <input type="text" name="jabatan" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="block font-semibold">Email</label>
                <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="block font-semibold">Foto</label>
                <input type="file" name="foto" accept="image/*" class="w-full border rounded px-3 py-2">
            </div>
            <div class="text-right">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
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
