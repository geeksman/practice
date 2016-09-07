@extends('layouts.app')

@section('content')
    {!! Form::open(['url' => 'post']) !!}
        @include('_common.__postForm')
    {!! Form::close() !!}
    <br>
    @include('errors.CreatePostError')
@stop    