@extends('layouts.master')
@section('content')
    @include('partials.errors')
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('user.update')}}" method="post">
                <div class="form-group">
                    <label for="name">Course Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$course->name}}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{$course->description}}">
                </div>
                <input type="hidden" name="id" value="{{$courseId}}">

                {{csrf_field()}}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
