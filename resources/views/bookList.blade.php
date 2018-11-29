@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <h4>List of books</h4>
                <div class="table-responsive">


                    <table id="mytable" class="table table-bordred table-striped">

                        <thead>
                        <th>Name</th>
                        <th>Category</th>

                        <th>Show</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Date</th>
                        </thead>
                        <tbody>

                        @foreach($books as $book)
                            <tr>
                                <td>{{$book -> name}}</td>
                                <td>{{$book -> category}}</td>
                                <td><a href="{{route('books.show', ['book' => $book])}}"><button class="btn btn-outline-primary"><span class="glyphicon glyphicon-eye-open"></span></button></a></td>
                                <td><a href="{{route('books.edit', ['book' => $book])}}"><button class="btn btn-outline-primary"><span class="glyphicon glyphicon-pencil"></span></button></a></td>
                                <td><button class="btn btn-outline-danger" data-toggle="modal" data-target="#delete" data-id="{{$book -> id}}"><span class="glyphicon glyphicon-trash"></span></button></td>
                                <td>{{$book -> created_at   }}</td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>

                </div>

            </div>
        </div>
    </div>

    <div id="delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <!-- header modal -->
                <div class="modal-header">
                    <h4 class="modal-title" id="mySmallModalLabel">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                <!-- body modal -->
                <div class="modal-body text-center">
                    Naozaj chcete odstranit tuto polozku?
                    <hr>
                    <form id="delForm" method="post">
                        {{method_field('DELETE')}} {{csrf_field()}}
                        <button type="submit" value="delete" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div>
        <a href="{{url('/books/create')}}">Create</a>
    </div>
    <div>
        <a href="{{url('/books')}}">All books</a>
    </div>


    <div class="sidebar-module">
        <h3>Archives</h3>
        <ol class="list-unstyled">
            @foreach($archives as $archive)
                <li>
                    <a href="{{Request::url()}}/?month={{$archive['month']}}&year={{$archive['year']}}">{{$archive['month'] . ' ' . $archive['year']}}</a>
                </li>
                @endforeach
        </ol>
    </div>
@endsection