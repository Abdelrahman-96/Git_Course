@extends('layouts.master')
@section('content')

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
            <th scope="row">{{$user->id - 1}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                <a href="{{route('admin.block', ['id' => $user->id])}}" class="btn btn-danger btn-sm">Block</a>
                <a href="{{route('admin.unblock', ['id' => $user->id])}}" class="btn btn-success btn-sm">Unblock</a>
            </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
