@extends('layouts.login')

@section('content')

    <div style="margin-top: 100px;"></div>
    <div class="col-md-4 col-md-offset-4">
        {{ Form::open() }}
        {{--<legend>--}}
            {{--Регистрация--}}
        {{--</legend>--}}
        <div class="form-group">
            {{ Form::label('username', 'Логин:') }}
            {{ Form::text('username', null, ['class' => 'form-control', 'required' => true]) }}
            {{ $errors->first('username', '<div class="text-danger">:message</div>') }}
        </div>
        <div class="form-group">
            {{ Form::label('email', 'Емайл:') }}
            {{ Form::email('email', null, ['class' => 'form-control', 'required' => true]) }}
            {{ $errors->first('email', '<div class="text-danger">:message</div>') }}
        </div>
        <div class="form-group">
            {{ Form::label('password', 'Пароль:') }}
            {{ Form::password('password', ['class' => 'form-control', 'required' => true]) }}
            {{ $errors->first('password', '<div class="text-danger">:message</div>') }}
        </div>
        <div class="form-group">
            {{ Form::label('vkid', 'Адрес страницы вконтакте:') }}
            {{ Form::text('vkid', null, ['class' => 'form-control']) }}
            {{ $errors->first('vkid', '<div class="text-danger">:message</div>') }}
        </div>
        <div class="form-group">
            {{ Form::submit('Регистрация', ['class' => 'btn btn-primary']) }}
        </div>
        {{ Form::close()}}
    </div>

@endsection