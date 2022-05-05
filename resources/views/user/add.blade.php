@extends('layouts.main')
@section('title', 'Laravel - CRUD')
@section('content')
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" value="{{old('email')}}">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Password: </label>
                <input type="password" name="password" class="form-control" value="{{old('password')}}">
            </div>
            <div class="form-group">
                <label for="">ảnh</label>
                <input type="file" name="file_upload" class="form-control">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Phone number</label>
                <input type="number" name="phone" class="form-control" value="{{old('phone')}}">
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <input type="text" name="address" class="form-control" value="{{old('address')}}">
            </div>
        </div>

        <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-primary" type="submit">Lưu</button>
        </div>
    </div>
</form>
@endsection
