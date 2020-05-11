@extends('layouts.master')
@section('content')
    @if(Session::has('info'))
        <div class="row">
            <div class="col-md-12">
                <p class="alert alert-info" >{{Session::get('info')}}</p>
            </div>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            Courses
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <a href="{{route('user.create')}}" class="btn btn-success">Create new course</a>
            </div>
        </div>
        <div class="container">
            @if(isset($courses) && count($courses) > 0)
                @foreach($courses as $course)
                    @if($course->userId == $userId)
                        <div class="card" style="margin-bottom: 20px">
                             <div class="card-header">
                                {{$course->name}}
                         </div>
                    <div class="card-body">
                            <div class="col-md-12">
                                {{$course->description}}
                                <a class="btn btn-light btn-sm" href="{{route('user.edit',['id'=> $course->id])}}">Edit</a>
                                <a class="btn btn-danger btn-sm" href="{{route('user.delete',['id'=> $course->id])}}">delete</a>
                            </div>
                    </div>
                </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
    <div class="container">
        <div class="col-md-12 text-center">
        </div>
    </div>

@endsection
