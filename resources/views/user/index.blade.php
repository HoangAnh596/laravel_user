@extends('layouts.main')
@section('title', 'Laravel - CRUD')
@section('content')

    <nav class="navbar navbar-light bg-light justify-content-between">

        <form class="form-inline" method="get">
            <input class="form-control mr-sm-2" name="keyword" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <h3>
            <a class="text-primary" href="{{route('users.add')}}">Add User</a>
        </h3>

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
        @foreach($user_data as $u)
            <tr>
                <td scope="row">{{(($user_data->currentPage()-1)*config('common.default_page_size')) + $loop->iteration}}</td>
                <td>{{$u->name}}</td>
                <td>{{$u->email}}</td>
                <td>
                    <img src="{{asset('storage/' . $u->image)}}" width="150">
                </td>
                <td>
                    <button class="btn btn-info">
                        <a class="badge badge-primary" href="{{route('users.edit', ['id' => $u->id])}}">Edit</a>
                    </button>
                    <button class="btn btn-info">
                        <a class="badge badge-primary" href="{{route('users.show', ['id' => $u->id])}}">Show</a>
                    </button>
                    <form action="{{route('users.remove', ['id' => $u->id])}}" method="POST">
                        @csrf
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')" >Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        {{$user_data->links()}}
    </nav>

@endsection
