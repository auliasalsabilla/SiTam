<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SITAM</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-b from-blue-300 to-white min-h-screen flex flex-col">

<header class="bg-blue-500 text-white p-4 font-bold text-xl">
    SITAM
</header>

<nav class="bg-blue-100 p-4 flex space-x-6">
    @if(isset($role) && $role === 'hrd')
        <a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a>
        <a href="{{ route('laporan') }}" class="hover:underline">Laporan</a>
        <a href="{{ route('admin') }}" class="hover:underline">Admin</a>
    @elseif(isset($role) && $role === 'karyawan')
        <a href="{{ route('scan') }}" class="hover:underline">Absen</a>
        <a href="{{ route('cuti') }}" class="hover:underline">Izin / Cuti</a>
    @endif
</nav>

<main class="flex-grow p-6 max-w-7xl mx-auto w-full">
    @yield('content')
</main>

<footer class="bg-blue-500 text-white text-center p-4">
    &copy; {{ date('Y') }} SITAM
</footer>

</body>
</html>
