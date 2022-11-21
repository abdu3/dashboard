@extends('Admin.master_app')
@section('admin')
<div class="py-12 my-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    {{-- @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                     @endif --}}
                    <div class="card-header card-header-border-bottom">
                        <h2>Add Slider</h2>
                    </div>
                    <div class="card-body">
                        <form method="Post" action="{{route('about.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Tilte">
                                @error("title")
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Short Description</label>
                                <textarea class="form-control" id="description" rows="3" name="short_desc" placeholder="Short Description"></textarea>
                                @error("short_desc")
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Long Description</label>
                                <textarea class="form-control" id="description" rows="3" name="long_desc" placeholder="Long Description"></textarea>
                                @error("long_desc")
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                            </div>
                            <div class="form-footer pt-4 pt-5 mt-4 border-top">
                                <button type="submit" class="btn btn-primary btn-default">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
