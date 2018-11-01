@extends('layouts.admin')




@section('content')


    <h2>Edit Ranking</h2>


    <div class="row">




        <div class="col-sm-9">


            {!! Form::model($teamRankingT20s, ['method'=>'PATCH', 'action'=> ['TeamRankingT20Controller@update', $teamRankingT20s->id],'files'=>true]) !!}


            <div class="form-group">
                {!! Form::label('club_id', 'Club') !!}
                {!! Form::select('club_id', [''=>'Choose Club'] + $clubs, null, ['class'=>'form-control'])!!}
            </div>



            <div class="form-group">
                {!! Form::label('points', 'Points') !!}
                {!! Form::number('points', null, ['class'=>'form-control'])!!}
            </div>




            <div class="form-group">
                {!! Form::submit('Edit Ranking', ['class'=>'btn btn-primary col-sm-3']) !!}
            </div>

            {!! Form::close() !!}







        </div>



    </div>



    <div class="row">

        @include('includes.form_error')


    </div>





@stop