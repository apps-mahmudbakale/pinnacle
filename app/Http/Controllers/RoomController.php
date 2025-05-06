<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr;

class RoomController extends Controller
{
    // Display all rooms
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    // DataTables AJAX response
    public function getRoomsData(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowPerPage = $request->get("length");
        $order_arr = $request->get('order');
        $column_arr = $request->get('columns');
        $search_arr = $request->get('search');

        $columnIndex = $order_arr[0]['column'];
        $columnName = $column_arr[$columnIndex]['data'];
        $columnSortOrder = $order_arr[0]['dir'];
        $searchValue = $search_arr['value'];

        $roomsQuery = DB::table('rooms');

        $totalRecords = $roomsQuery->count();

        $filteredQuery = clone $roomsQuery;
        $filteredQuery->where(function ($query) use ($searchValue) {
            $query->where('name', 'like', '%' . $searchValue . '%')
                ->orWhere('description', 'like', '%' . $searchValue . '%')
                ->orWhere('capacity', 'like', '%' . $searchValue . '%')
                ->orWhere('price', 'like', '%' . $searchValue . '%');
        });

        $totalRecordsWithFilter = $filteredQuery->count();

        $records = $filteredQuery->orderBy($columnName, $columnSortOrder)
            ->skip($start)
            ->take($rowPerPage)
            ->get();

        $data_arr = [];
        foreach ($records as $record) {
            $imagePath = $record->image_path ? url('storage/' . $record->image_path) : url('/assets/img/room_default.png');

            $roomDetails = '<td>
                                <h2 class="table-avatar">
                                    <a href="#" class="avatar avatar-sm mr-2">
                                        <img class="avatar-img rounded-circle" src="' . $imagePath . '" alt="Room Image">
                                    </a>
                                    <a href="#">' . $record->name . '
                                        <span>' . $record->capacity . ' persons</span>
                                    </a>
                                </h2>
                            </td>';

            $price = '<td>₦' . number_format($record->price, 2) . '</td>';
            $description = '<td>' . ($record->description ?: 'No description') . '</td>';

            $action = '<td class="text-right">
                        <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v ellipse_color"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="' . route('rooms.edit', $record->id) . '">
                                    <i class="fas fa-pencil-alt m-r-5"></i> Edit
                                </a>
                                <form action="' . route('rooms.destroy', $record->id) . '" method="POST" onsubmit="return confirm(\'Are you sure?\')">
                                    ' . csrf_field() . method_field('DELETE') . '
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="fas fa-trash-alt m-r-5"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>';

            $data_arr[] = [
                "name" => $roomDetails,
                "description" => $description,
                "price" => $price,
                "action" => $action,
            ];
        }

        return response()->json([
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordsWithFilter,
            "aaData" => $data_arr
        ]);
    }

    // Show create form
    public function create()
    {
        return view('rooms.create');
    }

    // Store new room
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'nullable|integer|min:1',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('rooms', 'public');
        }

        Room::create([
            'name' => $request->name,
            'capacity' => $request->capacity,
            'price' => $request->price,
            'description' => $request->description,
            'image_path' => $imagePath,
        ]);

        Toastr::success('Room created successfully', 'Success');
        return redirect()->route('rooms.index');
    }

    // Show edit form
    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    // Update room
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'nullable|integer|min:1',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($room->image_path && Storage::exists('public/' . $room->image_path)) {
                Storage::delete('public/' . $room->image_path);
            }
            $room->image_path = $request->file('image')->store('rooms', 'public');
        }

        $room->update([
            'name' => $request->name,
            'capacity' => $request->capacity,
            'price' => $request->price,
            'description' => $request->description,
            'image_path' => $room->image_path,
        ]);

        Toastr::success('Room updated successfully', 'Success');
        return redirect()->route('rooms.index');
    }

    // Delete room
    public function destroy($id)
    {
        $room = Room::findOrFail($id);

        if ($room->image_path && Storage::exists('public/' . $room->image_path)) {
            Storage::delete('public/' . $room->image_path);
        }

        $room->delete();

        Toastr::success('Room deleted successfully', 'Success');
        return redirect()->route('rooms.index');
    }
}
