@extends('Admin.master_app')
@section('admin')
    <div class="py-12 my-4">
                <div class="container">
                    <div class="row">
                        <h4>Home Slider</h4>
                        <a href="{{route('slider.create')}}"> <button class="btn btn-info">Add slider</button> </a>
                        <br>
                        <br>
                        <div class="col-md-12">
                            <div class="card">
                                @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{session('success')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                 @endif
                                 @if (session()->has('fail'))
                                 <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                     {{session('fail')}}
                                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                 </div>
                                  @endif

                                <div class="card-header">All Sliders</div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="5%">SL No</th>
                                            <th scope="col" width="15%">Slider title</th>
                                            <th scope="col" width="35%">Slider description</th>
                                            <th scope="col" width="15%">Slider Image</th>
                                            <th scope="col " width="15%">Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @foreach ($sliders as $slider )
                                    <tr>
                                        <th scope="row">{{$sliders->firstItem()+$loop->index}}</th>
                                        <td>{{$slider->title}}</td>
                                        <td>{{$slider->description}}</td>
                                        <td><img src="{{asset($slider->image)}}" alt="" style="width:70px; height:40px;"></td>
                                        <td>
                                            <a href="{{url('/slider/edit/'. $slider->id)}}" class="btn btn-info"><i class="bi bi-pencil-square"></i></a>
                                            <a href="{{url('/slider/delete/'. $slider->id)}}" class="btn btn-danger " onclick="return confirm('Are you sure you want to delete this item')"><i class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                                {{-- {{$sliders->links()}} --}}
                            </div>
                        </div>

                    </div>
                </div>

        </div>
    {{-- </div> --}}
@endsection

