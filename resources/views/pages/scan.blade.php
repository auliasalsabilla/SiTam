@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-semibold mb-6">Absensi Wajah (Demo Deteksi)</h1>

<div class="max-w-md mx-auto relative">
    <video id="video" class="w-full rounded border border-gray-300" autoplay muted playsinline></video>
    <canvas id="overlay" class="absolute top-0 left-0"></canvas>
</div>

<div id="status" class="mt-4 text-center font-semibold text-green-600"></div>

<!-- Tambahkan token CSRF -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Script Face API -->
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
        const MODEL_URL = '/weights';
        await Promise.all([
            faceapi.nets.tinyFaceDetector.loadFromUri(MODEL_URL),
            faceapi.nets.faceLandmark68Net.loadFromUri(MODEL_URL),
            faceapi.nets.faceRecognitionNet.loadFromUri(MODEL_URL),
            faceapi.nets.ssdMobilenetv1.loadFromUri(MODEL_URL)
        ]);
    }

    async function loadLabeledImages() {
        const labels = ['Firli Hanifurahman', 'Steven Marsel']; // Sesuaikan dengan folder yang tersedia

        return Promise.all(
            labels.map(async (label) => {
                const descriptions = [];
                for (let i = 1; i <= 1; i++) {
                    try {
                        const img = await faceapi.fetchImage(`/face-data/${label}/${i}.jpg`);
                        const detection = await faceapi.detectSingleFace(img)
                            .withFaceLandmarks()
                            .withFaceDescriptor();
                        if (detection) {
                            descriptions.push(detection.descriptor);
                        }
                    } catch (e) {
                        console.warn(`Gagal load image: ${label}/${i}.jpg`);
                    }
                }
                return new faceapi.LabeledFaceDescriptors(label, descriptions);
            })
        );
    }

    window.onload = async () => {
        await loadModels();
        await startVideo();

        video.addEventListener('play', async () => {
            overlay.width = video.videoWidth;
            overlay.height = video.videoHeight;

            const detectionOptions = new faceapi.TinyFaceDetectorOptions();
            const labeledFaceDescriptors = await loadLabeledImages();
            const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, 0.6);

            let absensiTercatat = false;

            const interval = setInterval(async () => {
                const detections = await faceapi.detectAllFaces(video, detectionOptions)
                    .withFaceLandmarks()
                    .withFaceDescriptors();

                ctx.clearRect(0, 0, overlay.width, overlay.height);

                if (detections.length > 0) {
                    const resizedDetections = faceapi.resizeResults(detections, {
                        width: overlay.width,
                        height: overlay.height
                    });

                    resizedDetections.forEach(detection => {
                        const box = detection.detection.box;
                        ctx.strokeStyle = '#00FF00';
                        ctx.lineWidth = 2;
                        ctx.strokeRect(box.x, box.y, box.width, box.height);
                    });

                    if (!absensiTercatat) {
                        const bestMatch = faceMatcher.findBestMatch(detections[0].descriptor);
                        const nama = bestMatch.label;

                        status.textContent = `Terdeteksi: ${nama}`;
                        absensiTercatat = true;

                        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                        fetch('/api/absen', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': token
                            },
                            body: JSON.stringify({ nama: nama })
                        })
                        .then(response => response.json())
                        .then(data => {
                            status.textContent = data.message;
                        });
                    }
                } else {
                    status.textContent = '';
                    absensiTercatat = false;
                }
            }, 1000);
        });
    };
</script>
@endsection
