@extends('Admin.master_app')
@section('admin')
    <div class="py-12 my-4">
                <div class="container">
                    <div class="row">
                        <h4>Home contact</h4>
                        <a href="{{route('contact.create')}}"> <button class="btn btn-info">Add contact</button> </a>
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

                                <div class="card-header">All contacts</div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="5%">SL No</th>
                                            <th scope="col" width="15%">contact Email</th>
                                            <th scope="col" width="15%">contact Phone</th>
                                            <th scope="col" width="35%">contact Address</th>
                                            <th scope="col " width="15%">Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i=1

                                        @endphp
                                    @foreach ($contacts as $contact )
                                    <tr>
                                        <th scope="row">{{$i++}}</th>
                                        <td>{{$contact->email}}</td>
                                        <td>{{$contact->phone}}</td>
                                        <td>{{$contact->address}}</td>
                                        <td>
                                            <a href="{{url('/contact/edit/'. $contact->id)}}" class="btn btn-info"><i class="bi bi-pencil-square"></i></a>
                                            <a href="{{url('/contact/delete/'. $contact->id)}}" class="btn btn-danger " onclick="return confirm('Are you sure you want to delete this item')"><i class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                                {{-- {{$contacts->links()}} --}}
                            </div>
                        </div>

                    </div>
                </div>

        </div>
    {{-- </div> --}}
@endsection

