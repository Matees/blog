@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-md-6">

            <div class="panel panel-primary">

                <div class="panel-heading"><h3>{{title_case($book->name)}}</h3>

                </div>

                <div class="panel-body">

                    {{$book->description}}

                </div>

                <div class="panel-footer"><strong>Category:</strong> {{$book->category}}</div>

            </div>

        </div>

    </div>

    <div>
        @foreach($book->comments as $comment)
            <div class="card">
                <li class="list-group">
                    <article>
                        <b>{{$comment -> created_at -> format('d/m')}}:</b> {{$comment->body}}
                    </article>
                </li>
            </div>
        @endforeach
    </div>

    <div class="card">
        <div class="card-block">
            <form action="/books/{{$book->id}}/comments" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <textarea name="body" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </div>
            </form>
        </div>
    </div>
    @include('errors')
@endsection


