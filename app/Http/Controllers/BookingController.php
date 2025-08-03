<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\Booking;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

    public function book(Room $room)
    {
        return view('booking', compact('room'));
    }

public function store(Request $request)
{
    $room = Room::findOrFail($request->room_id);
    $pricePerNight = $room->price;

    // Parse dates and calculate number of nights
    $checkIn = Carbon::parse($request->check_in);
    $checkOut = Carbon::parse($request->check_out);
    $nights = $checkOut->diffInDays($checkIn);

    // Prevent zero-night booking
    if ($nights <= 0) {
        return back()->with('error', 'Check-out date must be after check-in date.');
    }

    // Calculate total amount
    $totalAmount = $pricePerNight * $nights;

    $reference = Str::uuid();

    $booking = Booking::create([
        'firstname' => $request->firstname,
        'lastname' => $request->lastname,
        'email' => $request->email,
        'phone' => $request->phone,
        'room_id' => $room->id,
        'booking_date' => now(),
        'check_in_date' => $checkIn,
        'check_out_date' => $checkOut,
        'amount' => $totalAmount,
        'payment_reference' => $reference,
    ]);

    // Initialize transaction with Paystack
    $response = Http::withToken(config('services.paystack.secret'))->post(
        'https://api.paystack.co/transaction/initialize',
        [
            'email' => $request->email,
            'amount' => $totalAmount * 100, // Paystack expects amount in kobo
            'reference' => $reference,
            'callback_url' => route('bookings.verify', $reference),
        ]
    );

    if ($response->successful() && isset($response['data']['authorization_url'])) {
        return redirect()->away($response['data']['authorization_url']);
    }

    return back()->with('error', 'Failed to initialize payment with Paystack.');
}



    public function verify(Request $request)
    {
        $reference = $request->query('reference');

        $response = Http::withToken(config('services.paystack.secret'))
            ->get("https://api.paystack.co/transaction/verify/{$reference}");

        if ($response->successful()) {
            $booking = Booking::where('payment_reference', $reference)->first();
            if ($booking && $response['data']['status'] == 'success') {
                $booking->payment_status = 'paid';
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
        $booking->delete();
        return redirect()->back()->with('success', 'Booking successful Deleted.');
    }
}
