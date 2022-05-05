@extends('layouts.main')
@section('title', 'Laravel - CRUD')
@section('content')

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <form class="d-flex">
                <input class="form-control me-2" name="keyword" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <button class="btn btn-info">
                <a class="badge badge-primary" href="{{route('users.add')}}">Add Use</a>
            </button>
        </div>
    </nav>

    <table class="table">
        <thead>
        <th scope="col">Id</th>
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">image</th>
        <th scope="col">Action</th>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td scope="row">{{(($users->currentPage()-1)*config('common.default_page_size')) + $loop->iteration}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <img src="{{asset('storage/' . $user->image)}}" width="150">
                </td>
                <td>
                    <button class="btn btn-info">
                        <a class="badge badge-primary" href="{{route('users.edit', ['id' => $user->id])}}">Edit</a>
                    </button>
                    <button class="btn btn-info">
                        <a class="badge badge-primary" href="{{route('users.show', ['id' => $user->id])}}">Show</a>
                    </button>
                    <form action="{{route('users.remove', ['id' => $user->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this item?')" >Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        {{$users->links()}}
    </nav>

@endsection