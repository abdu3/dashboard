@extends('Admin.master_app')
@section('admin')
    <div class="py-12  my-4" >
                <div class="container">
                    <a href="/contact/all" class="btn btn-primary mb-3 ">Back</a>
                    <div class="row">
                        <div class="col-md-8 ">
                            <div class="card">
                                @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{session('success')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                 @endif
                                <div class="card-header">Edit Contact</div>
                                <div class="card-body">
                                    <form method="Post" action="{{route('contact.update',$contact->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" value="{{$contact->email}}" class="form-control" id="title" name="email" placeholder="Tilte">
                                            @error("email")
                                            <span class="text-danger">{{$message}}</span>
                                          @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" value="{{$contact->phone}}" class="form-control" id="title" name="phone" placeholder="Tilte">
                                            @error("phone")
                                            <span class="text-danger">{{$message}}</span>
                                          @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea class="form-control" id="address" rows="3" name="address" placeholder="Address">{{$contact->address}}</textarea>
                                            @error("address")
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
