<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\Booking;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // home page
    public function index()
    {
        $bookings = Booking::all()->count();
        $rooms = Room::all()->count();
        $roomBookingData = DB::table('bookings')
            ->join('rooms', 'bookings.room_id', '=', 'rooms.id')
            ->select('rooms.name as label', DB::raw('count(*) as value'))
            ->groupBy('rooms.name')
            ->get();
        return view('dashboard.home', compact('bookings', 'rooms', 'roomBookingData'));
    }

    // profile
    public function profile()
    {
        return view('profile');
    }
}
