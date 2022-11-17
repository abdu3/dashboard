<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            Edit Brand <b></b>

        </h2>
    </x-slot>

    <div class="py-12">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{session('success')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                 @endif
                                <div class="card-header">Edit Brand</div>
                                <div class="card-body">
                                    <form method="POST" action="{{route('update.brand',$brands->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">Update Brand Name</label>
                                          <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" value="{{$brands->brand_name}}" aria-describedby="emailHelp">
                                          @error("brand_name")
                                            <span class="text-danger">{{$message}}</span>
                                          @enderror
                                        </div>
                                        {{--  image form  --}}
                                        <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">Update Brand image</label>
                                          <input type="file"  name="brand_image" class="form-control" id="exampleInputEmail1" value="{{$brands->brand_image}}" aria-describedby="emailHelp">
                                          <input type="hidden"  name="old_image"  value="{{$brands->brand_image}}" >
                                          @error("brand_image")
                                            <span class="text-danger">{{$message}}</span>
                                          @enderror
                                        </div>
                                        <div class="mt-3">
                                            <img src="{{asset($brands->brand_image)}}" alt="" style="width:400px; height:200px; display:inline-block">
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3 ">Update Brand</button>
                                      </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <a href="/brand/all" class="btn btn-primary mt-5 ">Back</a>
                </div>

        </div>
    {{-- </div> --}}
</x-app-layout>
{{-- <script>
const  displayImage = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
    // console.log(image.src);
};
</script> --}}
