@extends('layouts.master')
@section('content')
{{-- message --}}
{!! Toastr::message() !!}
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title mt-5">Edit Barcode</h3>
                </div>
            </div>
        </div>
        <form action="{{ route('barcodes.update', $barcode->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-lg-12">
                    <div class="row formtype">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                       value="{{ old('name', $barcode->name) }}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>File</label>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input @error('file') is-invalid @enderror"
                                           id="customFile" name="file">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                @if ($barcode->link)
                                <small>Current File:
                                    <a href="{{ asset('storage/' . $barcode->link) }}" target="_blank">View File</a>
                                </small>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary buttonedit1">Update Barcode</button>
        </form>
    </div>
</div>
@endsection
