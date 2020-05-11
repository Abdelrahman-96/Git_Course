@extends('layouts.master')
@section('content')
    @include('partials.errors')
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('user.create')}}" method="post">
                <div class="form-group">
                    <label for="name">Course Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description">
                </div>
                {{csrf_field()}}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
