@extends('layouts.master')

@section('content')
    <div class="main">

        <div class="header">
            <h2>{{$person->id . ' | ' . $person->first_name . ' ' . $person->last_name}}</h2>
        </div>

        <div class="pure-g">
            @foreach($visits->get() as $visit)
                <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-3 pure-u-lg-1-4 pure-u-xl-1-5">
                    <p>
                        <span>Зашел: {{$visit->online }}</span>
                        <span>Ушел: {{$visit->offline }}</span>
                    </p>
                </div>

            @endforeach
        </div>

    </div>
@endsection