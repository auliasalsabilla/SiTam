@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-semibold mb-6">Pengajuan Izin / Cuti</h1>

<<<<<<< HEAD
<form class="max-w-md bg-white rounded shadow p-6" method="POST" action="#" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
        <label for="jenis_izin" class="block mb-1 font-semibold">Jenis Izin/Cuti</label>
        <select id="jenis_izin" name="jenis_izin" class="w-full border border-gray-300 rounded px-3 py-2">
            <option value="cuti_tahunan">Cuti Tahunan</option>
            <option value="izin_sakit">Izin Sakit</option>
            <option value="izin_lainnya">Izin Lainnya</option>
        </select>
    </div>

    <div class="mb-4">
        <label for="tanggal_mulai" class="block mb-1 font-semibold">Tanggal Mulai</label>
        <input type="date" id="tanggal_mulai" name="tanggal_mulai" class="w-full border border-gray-300 rounded px-3 py-2" required />
    </div>

    <div class="mb-4">
        <label for="tanggal_selesai" class="block mb-1 font-semibold">Tanggal Selesai</label>
        <input type="date" id="tanggal_selesai" name="tanggal_selesai" class="w-full border border-gray-300 rounded px-3 py-2" required />
    </div>

    <div class="mb-4">
        <label for="keterangan" class="block mb-1 font-semibold">Keterangan</label>
        <textarea id="keterangan" name="keterangan" rows="4" class="w-full border border-gray-300 rounded px-3 py-2" placeholder="Opsional"></textarea>
    </div>

    <div class="mb-4">
        <label for="mc_file" class="block mb-1 font-semibold">Upload Medical Checkup (MC)</label>
        <input type="file" id="mc_file" name="mc_file" class="w-full border border-gray-300 rounded px-3 py-2" accept=".pdf,.jpg,.jpeg,.png" />
        <p class="text-sm text-gray-500 mt-1">Format yang didukung: PDF, JPG, JPEG, PNG</p>
    </div>

=======
<form class="max-w-md bg-white rounded shadow p-6" method="POST" action="{{route('izin.store')}}" enctype="multipart/form-data">
    @csrf

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <label for="nama" class="block mb-1 font-semibold">Nama</label>
        <input type="nama" name="nama" class="w-full border border-gray-300 rounded px-3 py-2" required />
    </div>

    <div class="mb-4">
        <label for="jenis_izin" class="block mb-1 font-semibold">Jenis Izin/Cuti</label>
        <select id="jenis_izin" name="jenis_izin" class="w-full border border-gray-300 rounded px-3 py-2">
            <option value="cuti_tahunan">Cuti Tahunan</option>
            <option value="izin_sakit">Izin Sakit</option>
            <option value="izin_lainnya">Izin Lainnya</option>
        </select>
    </div>

    <div class="mb-4">
        <label for="tanggal_mulai" class="block mb-1 font-semibold">Tanggal Mulai</label>
        <input type="date" id="tanggal_mulai" name="tanggal_mulai" class="w-full border border-gray-300 rounded px-3 py-2" required />
    </div>

    <div class="mb-4">
        <label for="tanggal_selesai" class="block mb-1 font-semibold">Tanggal Selesai</label>
        <input type="date" id="tanggal_selesai" name="tanggal_selesai" class="w-full border border-gray-300 rounded px-3 py-2" required />
    </div>

    <div class="mb-4">
        <label for="keterangan" class="block mb-1 font-semibold">Keterangan</label>
        <textarea id="keterangan" name="keterangan" rows="4" class="w-full border border-gray-300 rounded px-3 py-2" placeholder="Opsional"></textarea>
    </div>

    <div class="mb-4">
        <label for="mc_file" class="block mb-1 font-semibold">Upload Medical Checkup (MC)</label>
        <input type="file" id="mc_file" name="mc_file" class="w-full border border-gray-300 rounded px-3 py-2" accept=".pdf,.jpg,.jpeg,.png" />
        <p class="text-sm text-gray-500 mt-1">Format yang didukung: PDF, JPG, JPEG, PNG</p>
    </div>

>>>>>>> 422612dd441f886530c363ea23817141e2787b01
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
        Ajukan Izin / Cuti
    </button>
</form>
@endsection
