@extends('layouts.master')

@section('title')
    Edit event {{ $event->title }}
@endsection

@section('content')

    <h2>Edit event {{ $event->title }}</h2>

    <form method='POST' action='/events/{{ $event->id }}'>
        <div class='details'>* Required fields</div>
        {{ csrf_field() }}
        {{ method_field('put') }}

        <label for='name'>* Name</label>
        <input type='text' name='name' id='name' value='{{ old('name', $event->name) }}'>
        @include('includes.error-field', ['fieldName' => 'name'])

        <label for='type_id'>* Type</label>
        <select name='type_id'>
            <option value=''>Choose one...</option>
            @foreach($types as $type)
                <option value='{{ $type->id }}' {{ (old('type_id', $event->type->id) == $type->id) ? 'selected' : '' }}>{{ $type->type }}</option>
            @endforeach
        </select>
        @include('includes.error-field', ['fieldName' => 'type_id'])

        <label for='month'>* Month</label>
        <select name='month' id='month'>
            <option value=''>Choose one...</option>
            @for ($i = 1; $i <= 12; $i++)
                <option value='{{ $i }}' {{ (old('month') == $i || $event->month == $i) ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
        </select>
        @include('includes.error-field', ['fieldName' => 'month'])

        <label for='day'>* Day</label>
        <select name='day' id='day'>
            <option value=''>Choose one...</option>
            @for ($i = 1; $i <= 31; $i++)
                <option value='{{ $i }}' {{ (old('day') == $i || $event->day == $i) ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
        </select>
        @include('includes.error-field', ['fieldName' => 'day'])

        <label for='year'>* Year</label>
        <select name='year' id='year'>
            <option value=''>Choose one...</option>
            @for ($i = 2019; $i <= 2025; $i++)
                <option value='{{ $i }}' {{ (old('year') == $i || $event->year == $i) ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
        </select>
        @include('includes.error-field', ['fieldName' => 'year'])

        <input type='submit' class='btn btn-primary' value='Save changes'>
    </form>

    @if(count($errors) > 0)
        <div class='alert alert-danger'>Please fix the errors above.</div>
    @endif
@endsection