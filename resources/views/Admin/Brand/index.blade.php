<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            All Brand <b></b>

        </h2>
    </x-slot>

    <div class="py-12">
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> --}}
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

                                <div class="card-header">All Brands</div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">SL No</th>
                                            <th scope="col">Brand Name</th>
                                            <th scope="col">Brand Image</th>
                                            <th scope="col">Created At</th>
                                            <th scope="col ">Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @foreach ($brands as $brand )
                                    <tr>
                                        <th scope="row">{{$brands->firstItem()+$loop->index}}</th>
                                        <td>{{$brand->brand_name}}</td>
                                        <td><img src="{{asset($brand->brand_image)}}" alt="" style="width:70px; height:40px;"></td>
                                        <td>
                                            @if($brand->created_at == NULL)
                                            <span class="text-danger">No date set</span>
                                            @else
                                            {{Carbon\carbon::parse($brand->created_at)->diffForHumans()}}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('/brand/edit/'. $brand->id)}}" class="btn btn-info"><i class="bi bi-pencil-square"></i></a>
                                            <a href="{{url('/brand/delete/'. $brand->id)}}" class="btn btn-danger " onclick="return confirm('Are you sure you want to delete this item')"><i class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                                {{$brands->links()}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">Add Brand</div>
                                <div class="card-body">
                                    <form method="POST" action="{{route('store.brand')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">Brand Name</label>
                                          <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                          @error("brand_name")
                                            <span class="text-danger">{{$message}}</span>
                                          @enderror
                                        </div>

                                        <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">Brand Image</label>
                                          <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                          @error("brand_image")
                                            <span class="text-danger">{{$message}}</span>
                                          @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add Brand</button>
                                      </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

        </div>
    {{-- </div> --}}
</x-app-layout>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">

     $('.show_confirm').click(function(event) {
        //   var form =  $(this).closest("form");
        //   var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                window.location = ('/brand/delete')
            }
          });
      });

</script>
