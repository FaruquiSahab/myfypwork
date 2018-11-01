@extends('layouts.admin')




@section('content')


    <h1>Edit Player</h1>


    <div class="row">


        <div class="col-sm-3">


            <img src="{{$player->photo ? $player->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">


        </div>



        <div class="col-sm-9">


            {!! Form::model($player, ['method'=>'PATCH', 'action'=> ['PlayerController@update', $player->id],'files'=>true]) !!}


            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['class'=>'form-control'])!!}
            </div>


              <div class="form-group">
                {!! Form::label('age', 'Age') !!}
                {!! Form::number('age', null, ['class'=>'form-control'])!!}
            </div>





            <div class="form-group">
                {!! Form::label('date_of_birth', 'Date of Birth') !!}
                {!! Form::date('date_of_birth', null, ['class'=>'form-control'])!!}
            </div>




            <div class="form-group">
                {!! Form::label('club_id', 'Club') !!}
                {!! Form::select('club_id', [''=>'Choose Club'] + $clubs, null, ['class'=>'form-control'])!!}
            </div>




            <div class="form-group">
                {!! Form::label('role_id', 'Role') !!}
                {!! Form::select('role_id', [''=>'Choose Role'] + $roles, null, ['class'=>'form-control'])!!}
            </div>




            <div class="form-group">
                {!! Form::label('batting_style_id', 'Batting Style') !!}
                {!! Form::select('batting_style_id', [''=>'Choose Style'] + $batting_styles, null, ['class'=>'form-control'])!!}
            </div>





            <div class="form-group">
                {!! Form::label('bow;ing_style_id', 'Bowling Style') !!}
                {!! Form::select('bowling_style_id', [''=>'Choose Style'] + $bowling_styles, null, ['class'=>'form-control'])!!}
            </div>



            <div class="form-group">
                {!! Form::label('photo_id', 'Image') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
            </div>



            <div class="form-group">
                {!! Form::submit('Edit Player', ['class'=>'btn btn-primary col-sm-3']) !!}
            </div>

            {!! Form::close() !!}







        </div>



    </div>



    <div class="row">

        @include('includes.form_error')


    </div>





@stop