@extends('layouts.admin')




@section('content')




    <h2>Create Tournamaent Edition</h2>


    <div class="row">


        <div class="col-sm-8">

            <div class="panel-body">

                {!! Form::open(['method'=>'POST', 'action'=> 'TournamentReferenceController@store','files'=>true]) !!}


                <div class="form-group">
                    {!! Form::label('photo_id', 'Logo') !!}
                    {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
                </div>
                

                <div class="form-group">
                    {!! Form::label('tournament_id', 'Tournament') !!}
                    {!! Form::select('tournament_id', $tournaments, null, ['placeholder'=>'Select a Tournament', 'class'=>'form-control', 'name'=>'tournament_id','id'=>'tournamentSelect', 'required' ])!!}
                </div>

                <div class="form-group">
                    {!! Form::label('tournament_type_id', 'Tournament') !!}
                    {!! Form::select('tournament_id', $m_type, null, ['placeholder'=>'Match Type', 'class'=>'form-control', 'name'=>'tournament_type_id','id'=>'TypeSelect', 'required'])!!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('tournament_format_id', 'Tournament') !!}
                    {!! Form::select('tournament_id', $t_format, null, ['placeholder'=>'Tournament Format', 'class'=>'form-control', 'name'=>'tournament_format_id','id'=>'formatSelect', 'required'])!!}
                </div>

                <div class="form-group">
                    {!! Form::label('number_of_teams', 'Num of Teams') !!}
                    {!! Form::number('number_of_teams', null, ['class'=>'form-control', 'min'=>'0', 'required'])!!}
                </div>




                <div class="form-group">
                    {!! Form::submit('Add Tournament', ['class'=>'btn btn-primary col-sm-3']) !!}
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>


    @include('includes.form_error')

@stop