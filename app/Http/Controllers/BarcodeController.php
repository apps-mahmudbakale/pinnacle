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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf,docx,xlsx,txt|max:20480',
        ]);

        // Upload file
        $path = $request->file('file')->store('uploads', 'public');

        // Save to DB
        $barcode = Barcode::create([
            'name' => request('name'),
            'link' => $path,
        ]);

        return redirect()->route('barcodes.index')->with('success', 'File uploaded and QR code generated.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barcode $barcode)
    {
        return view('barcode.show', compact('barcode'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barcode $barcode)
    {
        return view('barcode.edit', compact('barcode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barcode $barcode)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,docx,xlsx,txt|max:20480',
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads', 'public');
            $barcode->link = $path;
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
