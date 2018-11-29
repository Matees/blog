@extends('layouts.app')

@section('content')
    <form action="/books/{{$book -> id}}" method="post">
    {{method_field('PATCH')}}
    {{csrf_field()}}

    <div class="col-4">
        <label for="name">Book name</label>
        <input class="form-control" name="name" value="{{$book->name}}">
    </div>
    <div class="col-4">
        <label for="category">Book category</label>
        <input class="form-control" name="category" value="{{$book->category}}">
    </div>

    <div class="col-4">
        <label for="description">Book description</label>
        <textarea class="form-control" name="description">{{$book->description}}</textarea>
    </div>
        <br>
    <div class="col-4">
        <button type="submit" class="btn btn-primary">Edit</button>
    </div>
    </form>
@endsection