<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    public function getRoomsData(Request $request)
{
    $draw            = $request->get('draw');
    $start           = $request->get("start");
    $rowPerPage      = $request->get("length"); // total number of rows per page
    $columnIndex_arr = $request->get('order');
    $columnName_arr  = $request->get('columns');
    $order_arr       = $request->get('order');
    $search_arr      = $request->get('search');

    $columnIndex     = $columnIndex_arr[0]['column']; // Column index
    $columnName      = $columnName_arr[$columnIndex]['data']; // Column name
    $columnSortOrder = $order_arr[0]['dir']; // asc or desc
    $searchValue     = $search_arr['value']; // Search value

    $rooms = DB::table('rooms');
    $totalRecords = $rooms->count();

    $totalRecordsWithFilter = $rooms->where(function ($query) use ($searchValue) {
        $query->where('name', 'like', '%' . $searchValue . '%')
              ->orWhere('description', 'like', '%' . $searchValue . '%')
              ->orWhere('capacity', 'like', '%' . $searchValue . '%')
              ->orWhere('price', 'like', '%' . $searchValue . '%');
    })->count();

    if ($columnName == 'name') {
        $columnName = 'name';
    }

    $records = $rooms->orderBy($columnName, $columnSortOrder)
        ->where(function ($query) use ($searchValue) {
            $query->where('name', 'like', '%' . $searchValue . '%')
                  ->orWhere('description', 'like', '%' . $searchValue . '%')
                  ->orWhere('capacity', 'like', '%' . $searchValue . '%')
                  ->orWhere('price', 'like', '%' . $searchValue . '%');
        })
        ->skip($start)
        ->take($rowPerPage)
        ->get();

    $data_arr = [];
    foreach ($records as $record) {
        $imagePath = $record->image_path ? url($record->image_path) : url('/assets/img/room_default.png');

        $roomDetails = '<td>
                            <h2 class="table-avatar">
                                <a href="#" class="avatar avatar-sm mr-2">
                                    <img class="avatar-img rounded-circle" src="'.$imagePath.'" alt="Room Image">
                                </a>
                                <a href="#">'.$record->name.'
                                    <span>'.$record->capacity.' persons</span>
                                </a>
                            </h2>
                        </td>';

        $price = '<td>₦'.number_format($record->price, 2).'</td>';

        $description = '<td>'.($record->description ?: 'No description').'</td>';

        $action = '<td class="text-right">
                    <div class="dropdown dropdown-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-v ellipse_color"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="edit-room.html">
                                <i class="fas fa-pencil-alt m-r-5"></i> Edit
                            </a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_room">
                                <i class="fas fa-trash-alt m-r-5"></i> Delete
                            </a> 
                        </div>
                    </div>
                </td>';

        $data_arr[] = [
            "name" => $roomDetails,
            "description"  => $description,
            "price"        => $price,
            "action"       => $action, 
        ];
    }

    $response = [
        "draw"                 => intval($draw),
        "iTotalRecords"        => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordsWithFilter,
        "aaData"               => $data_arr
    ];
    return response()->json($response);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'nullable|integer|min:1',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ]);
    
        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('rooms', 'public');
        }
    
        // Create the room
        Room::create([
            'name' => $request->name,
            'capacity' => $request->capacity,
            'price' => $request->price,
            'description' => $request->description,
            'image_path' => $imagePath,
        ]);
    
        // Success message and redirect
        return redirect()->route('rooms.index')->with('success', 'Room created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }
}
