@extends('Admin.master_app')
@section('admin')
    <div class="py-12  my-4" >
                <div class="container">
                    <a href="/slider/home" class="btn btn-primary mb-3 ">Back</a>
                    <div class="row">
                        <div class="col-md-8 ">
                            <div class="card">
                                @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{session('success')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                 @endif
                                <div class="card-header">Edit Slider</div>
                                <div class="card-body">
                                    <form method="POST" action="{{route('slider.update',$sliders->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">Update Slider Name</label>
                                          <input type="text" name="title" class="form-control" id="exampleInputEmail1" value="{{$sliders->title}}" aria-describedby="emailHelp">
                                          @error("title")
                                            <span class="text-danger">{{$message}}</span>
                                          @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Short Description</label>
                                            <textarea class="form-control"  id="description" rows="3" name="description" placeholder="Short Description">{{$sliders->description}}</textarea>
                                            @error("description")
                                            <span class="text-danger">{{$message}}</span>
                                          @enderror
                                        </div>
                                        {{--  image form  --}}
                                        <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">Update Slider image</label>
                                          <input type="file"  name="image" class="form-control" id="exampleInputEmail1" value="{{$sliders->image}}" aria-describedby="emailHelp">
                                          <input type="hidden"  name="old_image"  value="{{$sliders->image}}" >
                                          @error("image")
                                            <span class="text-danger">{{$message}}</span>
                                          @enderror
                                        </div>
                                        <div class="mt-3">
                                            <img src="{{asset($sliders->image)}}" alt="" style="width:400px; height:200px; display:inline-block">
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3 ">Update Slider</button>
                                      </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

        </div>
@endsection
