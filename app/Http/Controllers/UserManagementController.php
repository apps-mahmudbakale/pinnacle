<?php

namespace App\Http\Controllers;

use App\Models\User;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    /** user list */
    public function index()
    {
        $users = User::all();
        return view('usermanagement.listuser', compact('users'));
    }

    /** add neew users */
    public function create()
    {
        return view('usermanagement.useraddnew');
    }

    public  function edit(User $user){
        return view('usermanagement.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone_number' => 'nullable|string|max:20',
            'role_name' => 'nullable|string|max:100',
            'position' => 'nullable|string|max:100',
            'department' => 'nullable|string|max:100',
            'password' => 'nullable|min:6|confirmed',
            'profile' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Update fields
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->role_name = $request->role_name;
        $user->position = $request->position;
        $user->department = $request->department;

        // Update password only if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Handle profile image upload
        if ($request->hasFile('profile')) {
            // Delete old image if exists
            if ($user->profile && Storage::exists('public/' . $user->profile)) {
                Storage::delete('public/' . $user->profile);
            }

            // Store new image
            $path = $request->file('profile')->store('profiles', 'public');
            $user->profile = $path;
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }


    /** get users data */
    public function getUsersData(Request $request)
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

        $users =  DB::table('users');
        $totalRecords = $users->count();

        $totalRecordsWithFilter = $users->where(function ($query) use ($searchValue) {
            $query->where('name', 'like', '%' . $searchValue . '%');
            $query->orWhere('user_id', 'like', '%' . $searchValue . '%');
            $query->orWhere('email', 'like', '%' . $searchValue . '%');
            $query->orWhere('position', 'like', '%' . $searchValue . '%');
            $query->orWhere('phone_number', 'like', '%' . $searchValue . '%');
            $query->orWhere('status', 'like', '%' . $searchValue . '%');
        })->count();

        if ($columnName == 'name') {
            $columnName = 'name';
        }
        $records = $users->orderBy($columnName, $columnSortOrder)
            ->where(function ($query) use ($searchValue) {
                $query->where('name', 'like', '%' . $searchValue . '%');
                $query->orWhere('user_id', 'like', '%' . $searchValue . '%');
                $query->orWhere('email', 'like', '%' . $searchValue . '%');
                $query->orWhere('position', 'like', '%' . $searchValue . '%');
                $query->orWhere('phone_number', 'like', '%' . $searchValue . '%');
                $query->orWhere('status', 'like', '%' . $searchValue . '%');
            })
            ->skip($start)
            ->take($rowPerPage)
            ->get();
        $data_arr = [];
        foreach ($records as $key => $record) {

            $name = '<td>
                        <h2 class="table-avatar">
                            <a href="profile.html" class="avatar avatar-sm mr-2">
                                <img class="avatar-img rounded-circle" src="'.url('/assets/img/hotel_logo.png').'" alt="User Image">
                            </a>
                            <a href="#">'.$record->name.'
                                <span>'.$record->user_id.'</span>
                            </a>
                        </h2>
                    </td>';
            $status = '<td>
                        <div class="actions">
                            <a href="#" class="btn btn-sm bg-success-light mr-2">'.$record->status.'</a>
                        </div>
                    </td>';
            $action = '<td class="text-right">
                        <div class="dropdown dropdown-action">
                            <a href="#"class="action-icon dropdown-toggle" data-toggle="dropdown"aria-expanded="false">
                                <i class="fas fa-ellipsis-v ellipse_color"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="edit-staff.html">
                                    <i class="fas fa-pencil-alt m-r-5"></i> Edit
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_asset">
                                    <i class="fas fa-trash-alt m-r-5"></i> Delete
                                </a> 
                            </div>
                        </div>
                    </td>';

            $data_arr [] = [
                "name"         => $name,
                "email"        => $record->email,
                "role_name"    => $record->role_name,
                "last_login"   => Carbon::parse($record->last_login)->diffForHumans(),
                "position"     => $record->position,
                "phone_number" => $record->phone_number,
                "status"       => $status, 
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
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Delete profile image from storage if exists
        if ($user->profile && Storage::exists('public/' . $user->profile)) {
            Storage::delete('public/' . $user->profile);
        }

        // Delete the user
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
