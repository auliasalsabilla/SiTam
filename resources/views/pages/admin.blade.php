@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Data Karyawan</h1>

<div x-data="{ openForm: false }">
    <!-- Tombol Tambah -->
    <button
        class="bg-blue-600 text-white px-4 py-2 rounded mb-4 hover:bg-blue-700 transition"
        @click="openForm = !openForm"
    >
        + Tambah Karyawan
    </button>

<!-- Modal Tambah Karyawan -->
<div x-show="openForm" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
    <div @click.away="openForm = false" class="bg-white w-full max-w-md p-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-bold mb-4">Tambah Karyawan</h2>
        <form action="{{ route('karyawan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="block font-semibold">Nama</label>
        <input type="text" name="nama" class="w-full border p-2 rounded" required>
    </div>
    <div class="mb-3">
        <label class="block font-semibold">NIK</label>
        <input type="text" name="nik" class="w-full border p-2 rounded" required>
    </div>
    <div class="mb-3">
        <label class="block font-semibold">Jabatan</label>
        <input type="text" name="jabatan" class="w-full border p-2 rounded" required>
    </div>
    <div class="mb-3">
        <label class="block font-semibold">Email</label>
        <input type="email" name="email" class="w-full border p-2 rounded" required>
    </div>
    <div class="mb-3">
        <label class="block font-semibold">Foto Profil</label>
        <input type="file" name="foto" accept="image/*" class="w-full" required>
    </div>
    <div class="mb-3">
        <label class="block font-semibold">Foto Wajah untuk Face Recognition (boleh lebih dari satu)</label>
        <input type="file" name="wajah[]" multiple accept="image/*" class="w-full" required>
    </div>

    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        Simpan
    </button>
</form>

    </div>
</div>


<!-- Tabel Data Karyawan -->
<div class="bg-white p-4 rounded shadow">
    <table class="w-full border">
        <thead class="bg-blue-100">
            <tr>
                <th class="border p-2">Nama</th>
                <th class="border p-2">NIK</th>
                <th class="border p-2">Jabatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawans as $karyawan)
            <tr>
                <td class="border p-2">{{ $karyawan->nama }}</td>
                <td class="border p-2">{{ $karyawan->nik }}</td>
                <td class="border p-2">{{ $karyawan->jabatan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
