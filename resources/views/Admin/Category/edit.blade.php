<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            Edit Category <b></b>

        </h2>
    </x-slot>

    <div class="py-12">
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> --}}
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">Update Category</div>
                                <div class="card-body">
                                    <form method="POST" action="{{route('update.category',$categories->id)}}">
                                        @csrf
                                        <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">Update Category Name</label>
                                          <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" value="{{$categories->category_name}}" aria-describedby="emailHelp">
                                          @error("category_name")
                                            <span class="text-danger">{{$message}}</span>
                                          @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update Category</button>
                                      </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <a href="/category/all" class="btn btn-primary mt-5">Back</a>
                </div>

        </div>
    {{-- </div> --}}
</x-app-layout>
