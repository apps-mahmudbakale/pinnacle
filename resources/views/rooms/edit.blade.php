@extends('layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <h4 class="card-title">Edit Room</h4>
            </div>

            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form action="{{ route('rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Room Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $room->name }}" required>
                        </div>

                        <div class="form-group">
                            <label>Capacity</label>
                            <input type="number" name="capacity" class="form-control" value="{{ $room->capacity }}">
                        </div>

                        <div class="form-group">
                            <label>Price (₦)</label>
                            <input type="number" name="price" class="form-control" value="{{ $room->price }}" required>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control">{{ $room->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Current Image</label><br>
                            <img src="{{ $room->image_path ? asset($room->image_path) : asset('assets/img/room_default.png') }}"
                                 alt="Room Image" class="img-thumbnail" width="120">
                        </div>

                        <div class="form-group">
                            <label>Upload New Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Room</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
