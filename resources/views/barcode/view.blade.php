<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <meta name="mobile-web-app-capable" content="yes">
    <title>PDF Viewer</title>
    <style>
        :root {
            --primary-color: #4a6cf7;
            --error-color: #e74c3c;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            -webkit-tap-highlight-color: transparent;
        }

        .viewer-container {
            position: relative;
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            background: #f5f5f5;
        }

        .toolbar {
            padding: 10px;
            background: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 10;
        }

        .loading-container {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: rgba(255, 255, 255, 0.9);
            z-index: 20;
            transition: opacity 0.3s ease;
        }

        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid #f3f3f3;
            border-top: 4px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-bottom: 15px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .error-container {
            text-align: center;
            padding: 20px;
            color: var(--error-color);
            display: none;
        }

        .pdf-container {
            flex: 1;
            width: 100%;
            position: relative;
            overflow: auto;
            -webkit-overflow-scrolling: touch;
        }

        .pdf-embed {
            width: 100%;
            height: 100%;
            border: none;
            background: #fff;
        }

        .btn {
            padding: 8px 16px;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
            transition: background 0.2s;
        }

        .btn:hover {
            background: #3a5bd9;
        }

        .btn-download {
            background: #2ecc71;
        }

        .btn-download:hover {
            background: #27ae60;
        }

        .status-text {
            margin-top: 10px;
            color: #666;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .toolbar {
                padding: 8px;
            }
            
            .btn {
                padding: 6px 12px;
                font-size: 13px;
            }
        }
    </style>
</head>
<body>
    <div class="viewer-container">
        <div class="toolbar">
            <a href="{{ route('barcodes.show', $barcode) }}" class="btn">← Back</a>
            <a href="{{ route('barcodes.download', $barcode) }}" class="btn btn-download" download>
                Download PDF
            </a>
        </div>

        <div class="loading-container" id="loadingContainer">
            <div class="spinner"></div>
            <div class="status-text" id="statusText">Loading PDF...</div>
        </div>

        <div class="error-container" id="errorContainer">
            <h3>Error Loading PDF</h3>
            <p id="errorMessage">The PDF could not be loaded. Please try again later or download the file.</p>
            <a href="{{ route('barcodes.download', $barcode) }}" class="btn btn-download" style="margin-top: 15px;">
                Download PDF Instead
            </a>
        </div>

        <div class="pdf-container">
            <object id="pdfViewer" data="{{ $fileUrl }}" type="application/pdf" class="pdf-embed" 
                   onload="onPdfLoaded()" onerror="onPdfError('Failed to load PDF')">
                <p>Your browser does not support PDFs. 
                    <a href="{{ $fileUrl }}" download>Download the PDF</a> instead.
                </p>
            </object>
        </div>
    </div>

    <script>
        const loadingContainer = document.getElementById('loadingContainer');
        const errorContainer = document.getElementById('errorContainer');
        const statusText = document.getElementById('statusText');
        const errorMessage = document.getElementById('errorMessage');
        const pdfViewer = document.getElementById('pdfViewer');
        
        // Set a timeout to show loading is taking a while
        const loadingTimeout = setTimeout(() => {
            statusText.textContent = 'Still loading... This might take a moment for larger files.';
        }, 3000);

        // Handle PDF loaded successfully
        function onPdfLoaded() {
            clearTimeout(loadingTimeout);
            loadingContainer.style.opacity = '0';
            setTimeout(() => {
                loadingContainer.style.display = 'none';
            }, 300);
        }

        // Handle PDF loading errors
        function onPdfError(message) {
            clearTimeout(loadingTimeout);
            loadingContainer.style.display = 'none';
            errorContainer.style.display = 'block';
            if (message) {
                errorMessage.textContent = message;
            }
        }

        // Fallback for browsers that don't support PDF viewing
        function checkPdfSupport() {
            const isPdfSupported = 'application/pdf' in navigator.mimeTypes;
            if (!isPdfSupported) {
                onPdfError('Your browser does not support embedded PDFs. Please download the file to view it.');
            }
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            checkPdfSupport();
            
            // Add a small delay to ensure the loading indicator is shown
            setTimeout(() => {
                if (pdfViewer.clientHeight === 0) {
                    onPdfError('Failed to load PDF. The file might be corrupted or too large.');
                }
            }, 5000);
        });
    </script>
</body>
</html>