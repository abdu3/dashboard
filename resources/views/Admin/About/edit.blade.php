@extends('Admin.master_app')
@section('admin')
    <div class="py-12  my-4" >
                <div class="container">
                    <a href="/brand/all" class="btn btn-primary mb-3 ">Back</a>
                    <div class="row">
                        <div class="col-md-8 ">
                            <div class="card">
                                @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{session('success')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                 @endif
                                <div class="card-header">Edit Brand</div>
                                <div class="card-body">
                                    <form method="POST" action="{{route('about.update',$about->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">About Tilte</label>
                                          <input type="text" name="title" class="form-control" id="exampleInputEmail1" value="{{$about->title}}" aria-describedby="emailHelp">
                                          @error("title")
                                            <span class="text-danger">{{$message}}</span>
                                          @enderror
                                        </div>
                                        {{--  short description  --}}
                                        <div class="form-group">
                                            <label for="description">Short Description</label>
                                            <textarea class="form-control"  id="description" rows="3" name="short_desc" placeholder="Short Description">{{$about->short_desc}}</textarea>
                                            @error("short_desc")
                                            <span class="text-danger">{{$message}}</span>
                                          @enderror
                                        </div>
                                        {{--  long description  --}}
                                        <div class="form-group">
                                            <label for="description">Long Description</label>
                                            <textarea class="form-control"  id="description" rows="9" name="long_desc" placeholder="Long Description">{{$about->long_desc}}</textarea>
                                            @error("long_desc")
                                            <span class="text-danger">{{$message}}</span>
                                          @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3 ">Update About</button>
                                      </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

        </div>
@endsection
