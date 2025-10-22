<?php

namespace App\Http\Controllers;

use App\Models\Barcode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response; // Using the Response facade for downloads

class BarcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barcodes = Barcode::all();
        return view('barcode.index', compact('barcodes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barcode.create');
    }

    /**
     * Store a newly created resource in storage as Base64.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // Max 20MB, suitable for Base64 which increases size by about 33%
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf,docx,xlsx,txt|max:20480',
        ]);

        $file = $request->file('file');

        // Read file content and encode it to Base64
        $base64Data = base64_encode(file_get_contents($file->getRealPath()));

        // Get necessary file metadata
        $mimeType = $file->getMimeType();
        $originalFilename = $file->getClientOriginalName();

        // Save Base64 data and metadata to DB
        $barcode = Barcode::create([
            'name' => $request->name,
            'link' => $base64Data, // Now stores Base64 data
            'mime_type' => $mimeType,
            'original_filename' => $originalFilename,
        ]);

        return redirect()->route('barcodes.index')->with('success', 'File uploaded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barcode $barcode)
    {
        // The QR code and view routes link directly to the controller methods
        $qrCodeUrl = route('barcodes.view', $barcode->id);

        // For the download button
        $downloadUrl = route('barcodes.download', $barcode->id);

        // We use the view route as the general file URL
        $fileUrl = $qrCodeUrl;

        return view('barcode.show', compact('barcode', 'qrCodeUrl', 'downloadUrl', 'fileUrl'));
    }

    /**
     * Handle file download.
     */
    public function download(Barcode $barcode)
    {
        // Check if Base64 data exists
        if (empty($barcode->link)) {
            abort(404, 'File data not found');
        }

        // Decode the Base64 string
        $fileContent = base64_decode($barcode->link);

        // Get MIME type and filename from the model
        $mimeType = $barcode->mime_type ?? 'application/octet-stream';
        $filename = $barcode->original_filename ?? 'downloaded_file';

        // Return the decoded content as a downloadable response
        return Response::make($fileContent, 200, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            'Content-Length' => strlen($fileContent),
        ]);
    }

    /**
     * View the file content (used for embedding/displaying).
     */
    public function viewFile(Request $request)
    {
        $barcode = Barcode::findOrFail($request->barcode);
        dd($barcode);

        if (empty($barcode->link)) {
            abort(404, 'File data not found');
        }

        // Construct a data URI (data:mime/type;base64,data) for easy display in views
        // Note: The 'barcode.view' template must use this data URI (e.g., in an <img> or <iframe> tag).
        $fileUrl = 'data:' . ($barcode->mime_type ?? 'application/octet-stream') . ';base64,' . $barcode->link;

        return view('barcode.view', compact('barcode', 'fileUrl'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barcode $barcode)
    {
        return view('barcode.edit', compact('barcode'));
    }

    /**
     * Update the specified resource in storage as Base64.
     */
    public function update(Request $request, Barcode $barcode)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,docx,xlsx,txt|max:20480',
        ]);

        $data = ['name' => $request->name];

        if ($request->hasFile('file')) {
            // No need to delete old file from storage, as it was stored in the DB.

            $file = $request->file('file');

            // Read file content and encode it to Base64
            $data['link'] = base64_encode(file_get_contents($file->getRealPath()));

            // Get necessary file metadata
            $data['mime_type'] = $file->getMimeType();
            $data['original_filename'] = $file->getClientOriginalName();
        }

        $barcode->update($data);

        return redirect()->route('barcodes.index')->with('success', 'Barcode updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barcode $barcode)
    {
        // Since the file is stored in the DB, only the record needs to be deleted.
        $barcode->delete();
        return redirect()->route('barcodes.index')->with('success', 'File deleted successfully.');
    }
}
