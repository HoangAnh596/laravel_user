@extends('layouts.main')
@section('title', 'CRUD-Show')
@section('content')

    <div class="card mb-3" style="width: 50rem;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{asset('storage/' . $users->image)}}" class="card-img-top" alt="" width="">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h1 style="color: red" class="card-title">Personal information</h1>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Name:</b> {{$users->name}}</li>
                    <li class="list-group-item"><b>Email:</b> {{$users->email}}</li>
                    <li class="list-group-item"><b>Number phone:</b> {{$users->phone}}</li>
                    <li class="list-group-item"><b>Address:</b> {{$users->address}}</li>
                </ul>
            </div>
    </div>

@endsection
