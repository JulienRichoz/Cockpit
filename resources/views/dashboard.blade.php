@extends('layouts.app')

@section('content')

    @include('activities._activities')
    
    <div class="row align-items-center my-4">
    @include('events._events')
    @include('weeks._weeks')
    @include('pickets._pickets')
@endsection

@section('javascript')
    @auth
        <script src="{{ asset('js/activity.js') }}" defer></script>
        <script src="{{ asset('js/dashboard.js') }}" defer></script>
    @endauth
@endsection