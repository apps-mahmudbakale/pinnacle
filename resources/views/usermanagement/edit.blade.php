@extends('layouts.master')
@section('content')
{{-- message --}}
{!! Toastr::message() !!}
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title mt-5">Edit User</h3>
                </div>
            </div>
        </div>
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-12">
                    <div class="row formtype">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                       value="{{ old('name', $user->name) }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email', $user->email) }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                       name="phone_number" value="{{ old('phone_number', $user->phone_number) }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Role Name</label>
                                <select name="role_name" id="" class="form-control">
                                    <option selected>{{ old('role_name', $user->role_name) }}</option>
                                    <option>Admin User</option>
                                    <option>User</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Position</label>
                                <input type="text" class="form-control @error('position') is-invalid @enderror"
                                       name="position" value="{{ old('position', $user->position) }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Department</label>
                                <input type="text" class="form-control @error('department') is-invalid @enderror"
                                       name="department" value="{{ old('department', $user->department) }}">
                            </div>
                        </div>

                        {{-- Passwords are optional on edit --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>New Password <small class="text-muted">(Leave blank if not changing)</small></label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                       name="password">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                       name="password_confirmation">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Profile Image</label>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input @error('profile') is-invalid @enderror"
                                           id="customFile" name="profile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                @if ($user->profile)
                                <small>Current Image:
                                    <a href="{{ asset('storage/' . $user->profile) }}" target="_blank">View</a>
                                </small>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary buttonedit1">Update User</button>
        </form>
    </div>
</div>
@endsection
