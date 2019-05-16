@extends('layouts.master')

@section('title')
    {{ $event->title }}
@endsection

@section('head')
@endsection

@section('content')
    @if ($event_over)
        <h2>{{ $event->name }} is over!!</h2>
    @else
        <h2>{{ $event->name }} is {{ $remaining }} days away!</h2>
    @endif

    <div class='event cf'>
        <p>Category: {{ $event->type->type }}</p>
        <p>Date: {{ $event->month }}/{{ $event->day }}/{{ $event->year }}</p>
        <p>Added: {{ $event->created_at->format('m/d/y') }}</p>

        <ul class='eventActions'>
            <li><a href='/events/{{ $event->id }}/edit'><i class="fas fa-edit"></i> Edit</a>
            <li><a href='/'><i class="fas fa-eye"></i> View All Events</a>
        </ul>
        <form method='POST' action='/events/{{ $event->id }}'>
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <input type='submit' class='btn btn-primary' value='Delete event'>
        </form>

        <h3>Comments</h3>
        @foreach($event->comments as $comment)
            <b>{{$comment->name}}</b>
            <p>{{$comment->comment}}</p>
        @endforeach
    </div>
@endsection
