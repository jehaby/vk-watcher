@extends('layouts.master')

@section('content')
    <div class="person">

        <h2>{{$person->id . ' | ' . $person->first_name . ' ' . $person->last_name}}</h2>

        @foreach($visits->get() as $visit)
            <div class="visit">
                <p>
                    <span>Зашел: {{d($visit->created_at); }}</span>
                    <span>Ушел: {{$visit->updated_at; }}</span>
                </p>
            </div>
        @endforeach

    </div>

@endsection