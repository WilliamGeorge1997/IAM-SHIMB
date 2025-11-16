@extends('build::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('build.name') !!}</p>
@endsection
