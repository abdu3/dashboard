<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            All Category <b></b>

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

                                <div class="card-header">All Category</div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">SL No</th>
                                            <th scope="col">Category Name</th>
                                            <th scope="col">User</th>
                                            <th scope="col">Created At</th>
                                            <th scope="col ">Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @foreach ($categories as $category )
                                    <tr>
                                        <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
                                        {{-- <td></td> --}}
                                        <td>{{$category->category_name}}</td>
                                        {{--  with Eloquent ORM --}}
                                        <td>{{$category->user->name}}</td>

                                        {{--  with join relation in Query builder --}}
                                        {{-- <td>{{$category->name}}</td> --}}
                                        <td>
                                            @if($category->created_at == NULL)
                                            <span class="text-danger">No date set</span>
                                            @else
                                            {{-- can use  with out using Query builder --}}
                                            {{-- {{$category->created_at->diffForHumans()}} --}}
                                            {{--  when using Query builder --}}
                                            {{Carbon\carbon::parse($category->created_at)->diffForHumans()}}

                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{url('/category/edit/'. $category->id)}}" class="btn btn-info"><i class="bi bi-pencil-square"></i></a>
                                            <a href="{{url('/softDelete/category/'. $category->id)}}" class="btn btn-danger"><i class="bi bi-trash2"></i></a>
                                        </td>
                                    </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                                {{$categories->links()}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">Add Category</div>
                                <div class="card-body">
                                    <form method="POST" action="{{route('store.category')}}">
                                        @csrf
                                        <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">Category Name</label>
                                          <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                          @error("category_name")
                                            <span class="text-danger">{{$message}}</span>
                                          @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add Category</button>
                                      </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- trashed List  --}}
                    <div style="margin-top: 100px;">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">Trached Category</div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">SL No</th>
                                                <th scope="col">Category Name</th>
                                                <th scope="col">User</th>
                                                <th scope="col">Created At</th>
                                                <th scope="col ">Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @foreach ($trashCat as $category )
                                        <tr>
                                            <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
                                            {{-- <td></td> --}}
                                            <td>{{$category->category_name}}</td>
                                            {{--  with Eloquent ORM --}}
                                            <td>{{$category->user->name}}</td>

                                            {{--  with join relation in Query builder --}}
                                            {{-- <td>{{$category->name}}</td> --}}
                                            <td>
                                                @if($category->created_at == NULL)
                                                <span class="text-danger">No date set</span>
                                                @else
                                                {{-- can use  with out using Query builder --}}
                                                {{-- {{$category->created_at->diffForHumans()}} --}}
                                                {{--  when using Query builder --}}
                                                {{Carbon\carbon::parse($category->created_at)->diffForHumans()}}

                                                @endif
                                            </td>

                                            <td>
                                                <a href="{{url('restore/category/'. $category->id)}}" class="btn btn-info"><i class="bi bi-arrow-clockwise"></i></a>
                                                <a href="{{url('pDelete/category/'. $category->id)}}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                            </td>
                                        </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{$trashCat->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    {{-- </div> --}}
</x-app-layout>
