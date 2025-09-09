@extends('layouts.master')

@section('content')
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="mt-5 d-flex justify-content-between align-items-center">
                            <h4 class="card-title mt-2">All List Rooms</h4>
                            <a href="{{ route('rooms.create') }}" class="btn btn-primary">Add Room</a>
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
                                        <th>Room</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($rooms as $room)
                                        @php
                                            // Normalize image path (remove any leading "storage/")
                                            $cleanPath = $room->image_path
                                                ? ltrim(str_replace('storage/', '', $room->image_path), '/')
                                                : null;

                                            $imagePath = $cleanPath
                                                ? asset('storage/' . $cleanPath)
                                                : asset('assets/img/room_default.png');
                                        @endphp
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="#" class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle" src="{{ $imagePath }}" alt="Room Image">
                                                    </a>
                                                    <a href="#">{{ $room->name }}
                                                        <span>{{ $room->capacity }} persons</span>
                                                    </a>
                                                </h2>
                                            </td>
                                            <td>{{ $room->description }}</td>
                                            <td>₦{{ number_format($room->price, 2) }}</td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown">
                                                        <i class="fas fa-ellipsis-v ellipse_color"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="{{ route('rooms.edit', $room->id) }}">
                                                            <i class="fas fa-pencil-alt m-r-5"></i> Edit
                                                        </a>
                                                        <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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
