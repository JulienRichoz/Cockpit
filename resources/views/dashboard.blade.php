@extends('layouts.app')

@section('content')
    @include('activities._activities')
    @include('events._events')
    @include('weeks._weeks')
    @include('pickets._pickets')
@endsection

@section('javascript')
@endsection