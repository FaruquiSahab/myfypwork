@extends('layouts.admin')




@section('content')


    <h1>Edit Club</h1>


    <div class="row">


        <div class="col-sm-3">


            <img src="{{$club->photo ? $club->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">


        </div>



        <div class="col-sm-9">


            {!! Form::model($club, ['method'=>'PATCH', 'action'=> ['ClubController@update', $club->id],'files'=>true]) !!}


            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['class'=>'form-control'])!!}
            </div>


            <div class="form-group">
                {!! Form::label('level_id', 'Level') !!}
                {!! Form::select('level_id',  $levels, null, ['class'=>'form-control'])!!}
            </div>




            <div class="form-group">
                {!! Form::label('photo_id', 'Photo') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
            </div>




            <div class="form-group">
                {!! Form::submit('Edit Coach', ['class'=>'btn btn-primary col-sm-3']) !!}
            </div>

            {!! Form::close() !!}







        </div>



    </div>



    <div class="row">

        @include('includes.form_error')


    </div>





@stop