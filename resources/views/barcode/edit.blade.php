@extends('layouts.master')

@section('content')
{{-- message --}}
{!! Toastr::message() !!}

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title mt-5">Edit Room</h3>
                </div>
            </div>
        </div>

        <form action="{{ route('rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-lg-12">
                    <div class="row formtype">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Room Name</label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       name="name"
                                       value="{{ old('name', $room->name) }}">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Room Capacity</label>
                                <input type="number"
                                       class="form-control @error('capacity') is-invalid @enderror"
                                       name="capacity"
                                       value="{{ old('capacity', $room->capacity) }}">
                                @error('capacity')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Price (₦)</label>
                                <input type="text"
                                       class="form-control @error('price') is-invalid @enderror"
                                       name="price"
                                       value="{{ old('price', $room->price) }}">
                                @error('price')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Room Image</label>
                                <div class="custom-file mb-3">
                                    <input type="file"
                                           class="custom-file-input @error('image') is-invalid @enderror"
                                           id="customFile"
                                           name="image">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                    @error('image')
                                    <span class="text-danger d-block mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                @if($room->image_path)
                                <img src="{{ asset('storage/' . $room->image_path) }}"
                                     alt="Room Image"
                                     class="img-thumbnail mt-2"
                                     width="150">
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Room Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                          name="description"
                                          rows="4">{{ old('description', $room->description) }}</textarea>
                                @error('description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary buttonedit1">Update Room</button>
        </form>
    </div>
</div>
@endsection
s