@extends('layouts.app')

@section('content')

<form method="post" action="/books">
    {{csrf_field()}}
    <div class="col-4">
        <label for="name">Book name</label>
        <input class="form-control" name="name" placeholder="Enter name">
    </div>
    <div class="col-4">
        <label for="category">Book category</label>
        <input class="form-control" name="category" placeholder="Enter category">
    </div>
    <div class="col-4">
        <label for="description">Book description</label>
        <textarea class="form-control" name="description" placeholder="Enter description"></textarea>
    </div>
    <br>
    <div class="col-4">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
    @include('errors')
    @endsection