@extends('layouts.admin')




@section('content')


    <h2>Edit Ranking</h2>


    <div class="row">


        <div class="col-sm-3">


            <img src="{{$playerRankingT20s->player->photo ? $playerRankingT20s->player->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">


        </div>



        <div class="col-sm-9">


            {!! Form::model($playerRankingT20s, ['method'=>'PATCH', 'action'=> ['PlayerRankingT20Controller@update', $playerRankingT20s->id],'files'=>true]) !!}


            <div class="form-group">
                {!! Form::label('player_id', 'Player') !!}
                {!! Form::select('player_id', [''=>'Choose Player'] + $players, null, ['class'=>'form-control'])!!}
            </div>


            <div class="form-group">
                {!! Form::label('points', 'Points') !!}
                {!! Form::number('points', null, ['class'=>'form-control'])!!}
            </div>



            <div class="form-group">
                {!! Form::label('club_id', 'Club') !!}
                {!! Form::select('club_id', [''=>'Choose Club'] + $clubs, null, ['class'=>'form-control','disabled' =>'true'])!!}
            </div>




            <div class="form-group">
                {!! Form::label('role_id', 'Role') !!}
                {!! Form::select('role_id', [''=>'Choose Role'] + $roles, null, ['class'=>'form-control','disabled' =>'true'])!!}
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