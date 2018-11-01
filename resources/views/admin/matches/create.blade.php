@extends('layouts.admin')




@section('content')




    <h2>Add Match</h2>


    <div class="row">


        <div class="col-sm-8">

            <div class="panel-body">

    {!! Form::open(['method'=>'POST', 'action'=> 'MatchController@store','files'=>true]) !!}





                <div class="form-group">
                    {!! Form::label('date', 'Date') !!}
                    {!! Form::date('date', null, ['class'=>'form-control'])!!}
                </div>




                <div class="form-group">
                    {!! Form::label('match_type_id', 'Match Type') !!}
                    {!! Form::select('match_type_id', [''=>'Choose Match Type'] + $match_types, null, ['class'=>'form-control'])!!}
                </div>



                <div class="form-group">
                    {!! Form::label('club_id_1', '1st Club') !!}
                    {!! Form::select('club_id_1', [''=>'Choose Club'] + $clubs, null, ['class'=>'form-control'])!!}
                </div>




                <div class="form-group">
                    {!! Form::label('club_id_2', '2nd Club ') !!}
                    {!! Form::select('club_id_2', [''=>'Choose Club'] + $clubs, null, ['class'=>'form-control'])!!}
                </div>



                <div class="form-group">
                    {!! Form::label('tournament_id', 'Tournament ') !!}
                    {!! Form::select('tournament_id', [''=>'Choose Tournament'] + $tournaments, null, ['class'=>'form-control'])!!}
                </div>




                <div class="form-group">
                    {!! Form::label('ground_id', 'Ground ') !!}
                    {!! Form::select('ground_id', [''=>'Choose Ground'] + $grounds, null, ['class'=>'form-control'])!!}
                </div>




    <div class="form-group">
        {!! Form::submit('Add Player', ['class'=>'btn btn-primary col-sm-3']) !!}
    </div>


    {!! Form::close() !!}

            </div>
</div>
    </div>


    @include('includes.form_error')

@stop