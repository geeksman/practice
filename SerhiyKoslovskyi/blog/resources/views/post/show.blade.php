@extends('layouts.app')

@section('content')
    <header class="img-post">
        <h1 class="info text-center">{{ $post->title }}</h1>
        <hr>
        <h3 class="info text-center">Posted by {{ $post->author }} on {{$post->posted_at}}</h3>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <p class="content-style">{{ $post->description }}</p>
            </div>
        </div>
    </div>
@stop