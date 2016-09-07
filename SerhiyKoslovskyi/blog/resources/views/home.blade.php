@extends('layouts.app')

@section('content')
<header class="img-header">
    <h1 class="text-center info">Free blog</h1>
    <hr>
    <h3 class="text-center info">Blog developed by Serhiy Kozlovskyi</h3>
</header>
<div class="container">
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            @foreach($posts as $obj)
                <div class="panel panel-info">
                    <div class="panel-body">
                        <div class="description">
                            <div class="pull-right">
                                <a href="{{ url('post/' . $obj['id'] . '/edit') }}" class="btn btn-info">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </a>
                                {!! Form::open(['method' => 'DELETE','route' => ['post.destroy', $obj->id]]) !!}
                                    <button type="submit" class="btn btn-danger btn-md">
                                        <i class="glyphicon glyphicon-trash"></i>
                                    </button>
                                {!! Form::close() !!}

                            </div>
                            <a href="{{ url('post/' . $obj['id']) }}">
                                <h2>{{ $obj['title'] }}</h2>
                                <h4>{{ substr($obj['description'], 0, 150) }}</h4>
                            </a>
                        </div>
                    </div>
                    <div class="detail">
                        <p><i>Posted by {{ $obj['author'] }} on {{$obj['posted_at']}}</i></p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
