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

        // Store the file in storage/app/public/barcodes
        $file = $request->file('file');
        $path = $file->store('barcodes', 'public');

        // Save to DB
        $barcode = Barcode::create([
            'name' => $request->name,
            'link' => $path, // store the path to the file
        ]);

        return redirect()->route('barcodes.index')->with('success', 'File uploaded successfully.');
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
        // Check if file exists in storage
        if (!\Storage::disk('public')->exists($barcode->link)) {
            abort(404, 'File not found');
        }

        // Get the file path
        $filePath = storage_path('app/public/' . $barcode->link);
        
        // Get the original file name with extension
        $originalName = pathinfo($barcode->link, PATHINFO_BASENAME);
        
        // Return the file as a download response
        return response()->download($filePath, $originalName);
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
            // Delete old file if exists
            if ($barcode->link && \Storage::disk('public')->exists($barcode->link)) {
                \Storage::disk('public')->delete($barcode->link);
            }
            
            // Store the new file
            $file = $request->file('file');
            $data['link'] = $file->store('barcodes', 'public');
        }

        $barcode->update($data);

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
