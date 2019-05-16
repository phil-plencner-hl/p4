@extends('layouts.master')

@section('title')
    Your Events
@endsection

@section('head')
    <link href='css/index.css' rel='stylesheet'>
@endsection

@section('content')

    <section id='yourBooks'>
        <h1>Your Events</h1>
        <ul class='eventActions'>
            <li><a href='/events/create'><i class="fas fa-plus"></i> Create Event</a>
        </ul>
        @foreach ($events as $event)
            @include('events._event')
        @endforeach
    </section>
@endsection