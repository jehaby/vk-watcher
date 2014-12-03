@extends('layouts.master')

@section('content')

    @if($persons->isEmpty())
        <p> You have nobody =(, maybe <a href="{{action('PersonController@create')}}">add</a>? </p>
    @endif

    @foreach($persons as $person)
        <p>
            <a href="{{action('PersonController@show', $person->id)}}">
                <span>{{ $person->id }} </span>  |
                <span> {{$person->first_name . ' ' . $person->last_name }}</span>
            </a>
        </p>
    @endforeach

@endsection