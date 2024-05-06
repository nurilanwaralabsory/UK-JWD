@extends('master.app')
@section('breadcrumb')
    <li><a href="{{ route('admin') }}">Admin <span class="mx-1">></span></a></li>
    <li><a> Create </a></li>
@endsection
@section('header')
    <h2 style="width: max-content">Tambah Data Buku</h2>
@endsection
@section('konten')
    <div class="row">
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="float-right heading1 margin_0">
                        <a href="{{ route('course.index') }}">
                            <button class="btn btn-warning text-light"><i
                                    class="fa fa-circle-arrow-left mr-2"></i>kembali</button>
                        </a>
                    </div>
                </div>
                <form class="padding_infor_info row" action="{{ route('course.update', $course->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-label">Name <span class="text-danger small">*</span></label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $course->name) }}" name="name">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea2"
                            style="height: 100px">{{ old('description', $course->description) }}</textarea>
                        <label for="floatingTextarea2">Description</label>
                    </div>
                    <div class="col-12 mt-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i> Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
