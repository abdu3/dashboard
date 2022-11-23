@extends('Admin.master_app')
@section('admin')
    <div class="py-12 my-4">
                <div class="container">
                    <div class="row">
                        <h4>Home Message</h4>
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

                                <div class="card-header">All Messages</div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="5%">SL No</th>
                                            <th scope="col" width="15%">Message Name</th>
                                            <th scope="col" width="10%">Message Email</th>
                                            <th scope="col" width="15%">Message Subject</th>
                                            <th scope="col" width="30%">Message Message</th>
                                            <th scope="col " width="15%">Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i=1
                                        @endphp
                                    @foreach ($messages as $message )
                                    <tr>
                                        <th scope="row">{{$i++}}</th>
                                        <td>{{$message->name}}</td>
                                        <td>{{$message->email}}</td>
                                        <td>{{$message->subject}}</td>
                                        <td>{{$message->message}}</td>
                                        <td>
                                            <a href="{{url('/message/delete/'. $message->id)}}" class="btn btn-danger " onclick="return confirm('Are you sure you want to delete this item')"><i class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{-- {{$messages->links()}} --}}
                            </div>
                        </div>

                    </div>
                </div>

        </div>
    {{-- </div> --}}
@endsection

