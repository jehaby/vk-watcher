@extends('layouts.master')

@section('content')
    <div id="main">
        <div class="header">
            <h1>Page Title</h1>
            <h2>A subtitle for your page goes here</h2>
        </div>

        <div class="pure-g">

            @foreach($persons as $person)
                <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-3 pure-u-lg-1-4 pure-u-xl-1-5">
                    <p>
                        <a href="{{action('PersonController@show', $person->id)}}">
                            <span>{{ $person->id }} </span>  |
                            <span> {{$person->first_name . ' ' . $person->last_name }}</span>
                        </a>
                    </p>
                    <p> Последний раз был: 1111-11-11 11-22</p>
                    <p> В среднем заходит № раз в день</p>
                    <p> В среднем проводит в контакте № часов в день </p>
                </div>
            @endforeach
        </div>
    </div>


@endsection

