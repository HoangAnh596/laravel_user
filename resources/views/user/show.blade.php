@extends('layouts.main')
@section('title', 'CRUD-Show')
@section('content')

    <div class="card mb-3" style="width: 50rem;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{asset('storage/' . $user_show->image)}}" class="card-img-top" alt="" width="">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h1 style="color: red" class="card-title">Thông tin cá nhân</h1>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Name:</b> {{$user_show->name}}</li>
                    <li class="list-group-item"><b>Email:</b> {{$user_show->email}}</li>
                    <li class="list-group-item"><b>Number phone:</b> {{$user_show->phone}}</li>
                    <li class="list-group-item"><b>Address:</b> {{$user_show->address}}</li>
                </ul>
            </div>
    </div>

@endsection
