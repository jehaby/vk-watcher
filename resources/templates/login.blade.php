@extends('layouts.master')

@section('title')
    <title>Вход</title>
@endsection

@section('content')

    <div style="margin-top: 100px;"></div>
    <div class="col-md-4 col-md-offset-4">
        <form class="pure-form pure-form-aligned" method="POST" action="{{ action('LoginController@store') }}" accept-charset="UTF-8">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <fieldset>

                <div class="pure-control-group">
                    <label for="name">Логин</label>
                    <input name="username" id="name" type="text" placeholder="" required="true">
                </div>

                <div class="pure-control-group">
                    <label for="password">Пароль</label>
                    <input name="password" id="password" type="password" placeholder="" required="true">
                </div>

                <div class="pure-controls">
                    <label for="cb" class="pure-checkbox">
                        <input id="cb" type="checkbox"> Запомнить
                    </label>

                    <button type="submit" class="pure-button pure-button-primary">Ок</button>
                </div>

            </fieldset>
        </form>
    </div>

@endsection