@extends('Admin.master_app')

@section('admin')


    <div class="py-12">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{session('success')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                             @endif
                            <div class="card-group">
                                @foreach ($images as $multi )
                                <div class="col-md-4 mt-5">
                                    <div class="card ">
                                        <img src="{{asset($multi->image)}}" alt="" srcset="">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">Add Images</div>
                                <div class="card-body">
                                    <form method="POST" action="{{route('store.images')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">multi Images</label>
                                          <input type="file" name="multi_images[]" class="form-control" id="exampleInputEmail1"
                                           aria-describedby="emailHelp" multiple>
                                          @error("multi_images")
                                            <span class="text-danger">{{$message}}</span>
                                          @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add images</button>
                                      </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

        </div>
@endsection
