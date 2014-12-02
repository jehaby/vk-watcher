@extends('layouts.master')

@section('content')
    wtfwtf

    @if($persons->isEmpty())
    <p> You have nobody =(, maybe <a href="{{action('PersonController@create')}}">add</a>? </p>

    @endif

    @foreach($persons as $person)
        <p>
            <a href="{{action('PersonController@show', $person->id)}}">
                {{$person->first_name . ' ' . $person->last_name }}
            </a>
        </p>
    @endforeach

@endsection