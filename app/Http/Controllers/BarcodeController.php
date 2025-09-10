<?php

namespace App\Http\Controllers;

use App\Models\Barcode;
use Illuminate\Http\Request;

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
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf,docx,xlsx,txt|max:20480',
        ]);

        // Convert file to Base64
        $file = $request->file('file');
        $base64File = 'data:' . $file->getMimeType() . ';base64,' . base64_encode(file_get_contents($file));

        // Save to DB
        $barcode = Barcode::create([
            'name' => $request->name,
            'link' => $base64File, // store Base64 instead of path
        ]);

        return redirect()->route('barcodes.index')->with('success', 'File uploaded (saved as Base64).');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barcode $barcode)
    {
        // Generate a short download URL instead of putting Base64 in QR
        $downloadUrl = route('barcodes.download', $barcode->id);

        return view('barcode.show', compact('barcode', 'downloadUrl'));
    }

    /**
     * Download the actual file.
     */
    public function download(Barcode $barcode)
    {
        // Get the file content from base64
        $fileContent = base64_decode($barcode->link);

        // Detect MIME type (fallback to octet-stream)
        $finfo = finfo_open();
        $mimeType = finfo_buffer($finfo, $fileContent, FILEINFO_MIME_TYPE);
        finfo_close($finfo);

        // Return as a downloadable response
        return response()->make($fileContent, 200, [
            'Content-Type' => $mimeType ?: 'application/octet-stream',
            'Content-Disposition' => 'attachment; filename="' . ($barcode->name ?? 'barcode_file') . '"',
        ]);
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

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $base64File = 'data:' . $file->getMimeType() . ';base64,' . base64_encode(file_get_contents($file));
            $barcode->link = $base64File;
        }

        $barcode->name = $request->name;
        $barcode->save();

        return redirect()->route('barcodes.index')->with('success', 'Barcode updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barcode $barcode)
    {
        $barcode->delete();
        return redirect()->route('barcodes.index')->with('success', 'File deleted successfully.');
    }
}
