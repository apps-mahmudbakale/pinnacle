@extends('layouts.app')

@section('content')
<div class="container my-5 d-flex justify-content-center">
    <div class="text-center p-4 border rounded shadow bg-white">
        {{-- QR Code --}}
        <div id="qrcode-wrapper" class="bg-light p-3 rounded">
            {!! QrCode::size(450)->generate($barcode->link) !!}
        </div>

        {{-- Barcode name --}}
        <h2 class="mt-3">{{ $barcode->name }}</h2>

        {{-- Download button --}}
        <button id="download-btn" class="btn btn-success mt-3">
            Download QR Code
        </button>
    </div>
</div>

{{-- QR Code Download Script --}}
<script>
    document.getElementById('download-btn').addEventListener('click', function () {
        const svg = document.querySelector('#qrcode-wrapper svg');

        if (!svg) {
            alert("QR code not found.");
            return;
        }

        const svgData = new XMLSerializer().serializeToString(svg);
        const canvas = document.createElement("canvas");
        const ctx = canvas.getContext("2d");

        const img = new Image();
        img.onload = function () {
            canvas.width = img.width;
            canvas.height = img.height;
            ctx.drawImage(img, 0, 0);

            const pngFile = canvas.toDataURL("image/png");

            const downloadLink = document.createElement("a");
            downloadLink.download = "{{ Str::slug($barcode->name) }}.png";
            downloadLink.href = pngFile;
            downloadLink.click();
        };

        img.src = 'data:image/svg+xml;base64,' + btoa(unescape(encodeURIComponent(svgData)));
    });
</script>
@endsection
