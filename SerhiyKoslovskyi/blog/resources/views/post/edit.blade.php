@extends('layouts.app')

@section('content')
    {!! Form::model($post, ['method' => 'PATCH','route' => ['post.update', $post->id]]) !!}
        @include('_common.__postForm')
    {!! Form::close() !!}
    <br>
    @include('errors.CreatePostError')
@stop