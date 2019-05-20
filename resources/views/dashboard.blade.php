@extends('layouts.app')

@section('content')
Hello dashboard
    @include('activities._activities')
    @include('events._events')
    @include('weeks._weeks')
    @include('pickets._pickets')
@endsection