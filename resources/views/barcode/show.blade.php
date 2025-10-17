@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Barcode Details</h4>
                </div>
                <div class="card-body text-center">
                    {{-- QR Code --}}
                    <div class="mb-4">
                        <h5 class="mb-3">Scan to Download File</h5>
                        <div id="qrcode-wrapper" class="bg-light p-3 rounded d-inline-block">
                            {!! QrCode::size(300)->generate($qrCodeUrl) !!}
                        </div>
                    </div>

                    {{-- File Info --}}
                    <div class="mb-4">
                        <h4 class="text-primary">{{ $barcode->name }}</h4>
                        <p class="text-muted">
                            Created: {{ $barcode->created_at->format('M d, Y') }}
                        </p>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="d-flex justify-content-center gap-3">
                        <button id="download-qr-btn" class="btn btn-outline-primary">
                            <i class="fas fa-download me-2"></i>Download QR Code
                        </button>
                        <a href="{{ route('barcodes.download', $barcode->id) }}" class="btn btn-primary" target="_blank">
                            <i class="fas fa-external-link-alt me-2"></i>Open File
                        </a>
                    </div>
                </div>
                <div class="card-footer text-muted text-center">
                    <small>Scan the QR code to open the file, or use the download button to save it</small>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- QR Code Download Script --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const downloadQrBtn = document.getElementById('download-qr-btn');
        
        if (downloadQrBtn) {
            downloadQrBtn.addEventListener('click', function() {
                const svg = document.querySelector('#qrcode-wrapper svg');

                if (!svg) {
                    alert("QR code not found.");
                    return;
                }

                const svgData = new XMLSerializer().serializeToString(svg);
                const canvas = document.createElement("canvas");
                const ctx = canvas.getContext("2d");
                const img = new Image();

                img.onload = function() {
                    canvas.width = img.width;
                    canvas.height = img.height;
                    ctx.drawImage(img, 0, 0);

                    const pngFile = canvas.toDataURL("image/png");
                    const downloadLink = document.createElement("a");
                    downloadLink.download = "{{ Str::slug($barcode->name) }}-qrcode.png";
                    downloadLink.href = pngFile;
                    downloadLink.click();
                };

                img.src = 'data:image/svg+xml;base64,' + btoa(unescape(encodeURIComponent(svgData)));
            });
        }
    });
</script>

<style>
    .card {
        border: none;
        border-radius: 10px;
        overflow: hidden;
    }
    .card-header {
        border-bottom: none;
        padding: 1.5rem;
    }
    .card-body {
        padding: 2.5rem;
    }
    .btn {
        padding: 0.5rem 1.5rem;
        border-radius: 5px;
        font-weight: 500;
    }
</style>
@endsection
