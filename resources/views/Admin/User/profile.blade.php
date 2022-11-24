
@extends('Admin.master_app')
@section('admin')
<div class="container">

    {{-- <img src="{{  Auth::user()->profile_photo_path ?asset(Auth::user()->profile_photo_url) : asset('backend/assets/img/user/none.png')}}" class="img-circle" alt="User Image" /> --}}
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
 <strong>{{ session('success') }}</strong>
 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
 </button>
  </div>
  @endif
    <div class="row">
        <div class="col-10">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Profile</h2>
                </div>
                <div class="card-body">
                    <form class="form-pill" method="POST" action="{{route('update.profile')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <img id="image-output" src="{{ Auth::user()->profile_photo_path ?asset( 'storage/'.Auth::user()->profile_photo_path) : asset('backend/assets/img/user/none.png')}}" class="img-circle " alt="User Image" style="width:100px;heigth:100px !important; border-radius:50%" />
                            <div>
                                <label class="btn btn-default border border-secondry  mt-2">
                                    Select A New Photo <input onchange="displayImage(event)" type="file" hidden name="profile_photo_path" >
                                </label>
                            </div>
                            @error("profile_photo_path")
                            <span class="text-danger">{{$message}}</span>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Change Name</label>
                            <input type="text" class="form-control" id="name" placeholder=" Name" name="name" value="{{Auth::user()->name}}">
                            @error("name")
                            <span class="text-danger">{{$message}}</span>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Change Email</label>
                            <input type="email" class="form-control" id="email" placeholder=" Email" name="email"  value="{{Auth::user()->email}}">
                            @error("email")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-10">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Change Password</h2>
                </div>
                <div class="card-body">
                    <form class="form-pill" method="POST" action="{{route('update.password')}}">
                        @csrf
                        <div class="form-group">
                            <label for="cPassword">Curren Password</label>
                            <input type="password" class="form-control" id="cPassword" placeholder="Curren Password" name="oldPass">
                            @error("oldPass")
                            <span class="text-danger">{{$message}}</span>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="newPassword"> New Password</label>
                            <input type="password" class="form-control" id="newPassword" placeholder="New Password" name="password">
                            @error("password")
                            <span class="text-danger">{{$message}}</span>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="coPassword">Confirm Password</label>
                            <input type="password" class="form-control" id="coPassword" placeholder="Confirm Password" name="password_confirmation">
                            @error("password_confirmation")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
const  displayImage = function(event) {
       var image = document.getElementById('image-output');
       console.log(image.src);
       image.src = URL.createObjectURL(event.target.files[0]);
};
</script>
