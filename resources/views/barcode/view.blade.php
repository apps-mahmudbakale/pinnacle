<!DOCTYPE html>
<html>
<head>
    <title>PDF Viewer</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }
        .pdf-container {
            width: 100%;
            height: 100vh;
            border: none;
        }
        object {
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <div class="pdf-container">
        <object data="{{ $fileUrl }}" type="application/pdf" width="100%" height="100%">
            <p>Your browser does not support PDFs. 
                <a href="{{ $fileUrl }}">Download the PDF</a> instead.
            </p>
        </object>
    </div>
</body>
</html>