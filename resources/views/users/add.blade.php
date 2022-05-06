@extends('layouts.main')
@section('title', 'CRUD-Add')
@section('content')
<form action="{{route('users.saveAdd')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Name: </label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}">
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" value="{{old('email')}}">
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Password: </label>
                <input type="password" name="password" class="form-control" value="{{old('password')}}">
                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="file_upload" class="form-control">
                @error('file_upload')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Phone number</label>
                <input type="number" name="phone" class="form-control" value="{{old('phone')}}">
                @error('phone')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <input type="text" name="address" class="form-control" value="{{old('address')}}">
                @error('address')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-primary" type="submit">Save</button>
        </div>
    </div>
</form>
@endsection
