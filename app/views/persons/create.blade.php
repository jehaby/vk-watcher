@extends('layouts.master')

@section('content')

    <form class="form-horizontal" role="form" method="POST" action="{{ url('p/')}}">

        {{ Form::token() }}

        <div class="form-group">
            <label class="col-sm-2 control-label" for="inputTitle">ID or url</label>
            <div class="col-sm-10"><input class="form-control" type="text" name="person_data" id="inputTitle"/></div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Добавить</button>
            </div>
        </div>


    </form>


@endsection