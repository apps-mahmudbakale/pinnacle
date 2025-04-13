<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    /** user list */
    public function userList()
    {
        return view('usermanagement.listuser');
    }

    /** add neew users */
    public function userAddNew()
    {
        return view('usermanagement.useraddnew');
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
}
