@extends('layouts.master')

@section('content')
{!! Toastr::message() !!}
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-5 d-flex justify-content-between align-items-center">
                        <h4 class="card-title mt-2">All List Bookings</h4>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body booking_card">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-center mb-0" id="RoomsList">
                                <thead>
                                <tr>
                                    <td>#</td>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Room</th>
                                    <th>Booking Date</th>
                                    <th>Check In Date</th>
                                    <th>Check Out Date</th>
                                    <th>Payment Ref</th>
                                    <th>Payment Status</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bookings as $room)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $room->firstname }}</td>
                                    <td>{{ $room->lastname }}</td>
                                    <td>{{ $room->email }}</td>
                                    <td>{{$room->phone}}</td>
                                    <td>{{$room->room->name}}</td>
                                    <td>{{$room->booking_date}}</td>
                                    <td>{{$room->check_in_date}}</td>
                                    <td>{{$room->check_out_date}}</td>
                                    <td>{{$room->payment_reference}}</td>
                                    <td>{{ucfirst($room->payment_status)}}</td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown">
                                                <i class="fas fa-ellipsis-v ellipse_color"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">

                                                <form action="{{ route('bookings.destroy', $room->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger">
                                                        <i class="fas fa-trash-alt m-r-5"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div> <!-- table-responsive -->
                    </div> <!-- card-body -->
                </div> <!-- card -->
            </div> <!-- col -->
        </div> <!-- row -->
    </div> <!-- container-fluid -->
</div> <!-- page-wrapper -->

@section('script')
<script>
    $(document).ready(function() {
        $('#RoomsList').DataTable(); // Client-side DataTable only
    });
</script>
@endsection

@endsection
