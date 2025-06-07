<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

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
        $amount = $room->price;

        $reference = Str::uuid();

        $booking = Booking::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'room_id' => $room->id,
            'booking_date' => now(),
            'check_in_date' => $request->check_in,
            'check_out_date' => $request->check_out,
            'amount' => $amount,
            'payment_reference' => $reference,
        ]);

        // Initialize transaction with Paystack
        $response = Http::withToken(config('services.paystack.secret'))->post(
            'https://api.paystack.co/transaction/initialize',
            [
                'email' => $request->email,
                'amount' => $amount * 100, // amount in kobo
                'reference' => $reference,
                'callback_url' => route('bookings.verify', $reference),
            ]
        );

//        dd($response->json());

        if ($response->successful() && isset($response['data']['authorization_url'])) {
            return redirect()->away($response['data']['authorization_url']);
        }

        // If initialization failed
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
