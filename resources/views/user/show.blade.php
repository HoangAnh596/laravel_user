@extends('layouts.main')
@section('title', 'Laravel - CRUD')
@section('content')
    <h1>Thông tin cá nhân </h1>
    <div class="card" style="width:30rem;">
        <img class="card-img-top" src="{{asset('storage/' . $user_show->image)}}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Name: {{$user_show->name}}</h5>
            <h5 class="card-title">Email: {{$user_show->email}}</h5>
            <h5 class="card-title">Number phone: {{$user_show->phone}}</h5>
            <h5 class="card-title">Address: {{$user_show->address}}</h5>
        </div>
    </div>

@endsection
