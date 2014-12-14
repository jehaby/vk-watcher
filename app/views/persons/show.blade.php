@extends('layouts.master')

@section('content')
    <div class="person">

        <h2>{{$person->id . ' | ' . $person->first_name . ' ' . $person->last_name}}</h2>

        @foreach($visits->get() as $visit)
            <div class="visit">
                <p>
                    <span>Зашел: {{$visit->online; }}</span>
                    <span>Ушел: {{$visit->offline; }}</span>
                </p>
            </div>
        @endforeach

    </div>

@endsection