@extends('Admin.master_app')
@section('admin')
    <div class="py-12 my-4">
                <div class="container">
                    <div class="row">
                        <h4>Home About</h4>
                        <a href="{{route('about.create')}}"> <button class="btn btn-info">Add about</button> </a>
                        <br>
                        <br>
                        <div class="col-md-12">
                            <div class="card ">
                                @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{session('success')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                 @endif

                                <div class="card-header">All Abuots</div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="5%">SL No</th>
                                            <th scope="col" width="15%"> title</th>
                                            <th scope="col" width="15%">short description</th>
                                            <th scope="col" width="35%"> long description</th>
                                            <th scope="col " width="15%">Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php
                                             $i=1;
                                        @endphp
                                    @foreach ($abouts as $about )
                                    <tr>
                                        {{-- <th scope="row">{{$abouts->firstItem()+$loop->index}}</th> --}}
                                        <th scope="row">{{$i++}}</th>
                                        <td>{{$about->title}}</td>
                                        <td>{{$about->short_desc}}</td>
                                        <td>{{$about->long_desc}}</td>
                                        <td>
                                            <a href="{{url('/about/edit/'. $about->id)}}" class="btn btn-info"><i class="bi bi-pencil-square"></i></a>
                                            <a href="{{url('/about/delete/'. $about->id)}}" class="btn btn-danger " onclick="return confirm('Are you sure you want to delete this item')"><i class="bi bi-trash"></i></a>
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

