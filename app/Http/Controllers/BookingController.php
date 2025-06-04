<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::all();
        return view('bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'room_id' => 'required|exists:rooms,id',
        ]);

        $room = Room::findOrFail($request->room_id);
        $amount = $room->price;

        $reference = Str::uuid();

        Booking::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'room_id' => $room->id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'amount' => $amount,
            'reference' => $reference,
        ]);

        return redirect()->away("https://api.paystack.co/transaction/initialize", [
            'headers' => ['Authorization' => 'Bearer ' . config('services.paystack.secret')],
            'json' => [
                'email' => $request->email,
                'amount' => $amount * 100,
                'reference' => $reference,
                'callback_url' => route('booking.verify'),
            ]
        ]);
    }

    public function verify(Request $request)
    {
        $reference = $request->query('reference');

        $response = Http::withToken(config('services.paystack.secret'))
            ->get("https://api.paystack.co/transaction/verify/{$reference}");

        if ($response->successful()) {
            $booking = Booking::where('reference', $reference)->first();
            if ($booking && $response['data']['status'] == 'success') {
                $booking->status = 'paid';
                $booking->save();
                return redirect('/')->with('success', 'Booking successful and payment confirmed.');
            }
        }

        return redirect('/')->with('error', 'Payment failed or not verified.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
