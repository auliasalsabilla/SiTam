@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-semibold mb-6">Absensi Wajah (Demo Deteksi)</h1>

<div class="max-w-md mx-auto relative">
    <video id="video" class="w-full rounded border border-gray-300" autoplay muted playsinline></video>
    <canvas id="overlay" class="absolute top-0 left-0"></canvas>
</div>

<div id="status" class="mt-4 text-center font-semibold text-green-600"></div>

<script defer src="https://cdn.jsdelivr.net/npm/face-api.js@0.22.2/dist/face-api.min.js"></script>
<script>
    const video = document.getElementById('video');
    const status = document.getElementById('status');
    const overlay = document.getElementById('overlay');
    const ctx = overlay.getContext('2d');

    async function startVideo() {
        try {
            const stream = await navigator.mediaDevices.getUserMedia({ video: {} });
            video.srcObject = stream;
        } catch (err) {
            alert('Gagal akses kamera: ' + err);
        }
    }

    async function loadModels() {
        const MODEL_URL = '/weights'; // ✅ Pakai lokal, ambil dari public/weights
        await faceapi.nets.tinyFaceDetector.loadFromUri(MODEL_URL);
    }

    video.addEventListener('play', () => {
        overlay.width = video.videoWidth;
        overlay.height = video.videoHeight;

        const detectionOptions = new faceapi.TinyFaceDetectorOptions();

        let absensiTercatat = false;

        const interval = setInterval(async () => {
            const detections = await faceapi.detectAllFaces(video, detectionOptions);

            ctx.clearRect(0, 0, overlay.width, overlay.height);

            if (detections.length > 0) {
                detections.forEach(det => {
                    const box = det.box;
                    ctx.strokeStyle = '#00FF00';
                    ctx.lineWidth = 2;
                    ctx.strokeRect(box.x, box.y, box.width, box.height);
                });

                if (!absensiTercatat) {
    absensiTercatat = true;
    status.textContent = 'Absensi masuk tercatat pada: ' + new Date().toLocaleTimeString();
    
    fetch('/api/absen', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            nama: 'Budi Santoso' // ganti nanti sesuai hasil deteksi wajah
        })
    });
}
            } else {
                status.textContent = '';
                absensiTercatat = false;
            }
        }, 500);
    });

    window.onload = async () => {
        await loadModels();
        startVideo();
    };
</script>
@endsection

