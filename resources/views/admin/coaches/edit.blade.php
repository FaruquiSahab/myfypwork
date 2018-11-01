@extends('layouts.admin')




@section('content')


    <h1>Edit Coach</h1>


    <div class="row">


        <div class="col-sm-3">


            <img src="{{$coach->photo ? $coach->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">


        </div>



        <div class="col-sm-9">


            {!! Form::model($coach, ['method'=>'PATCH', 'action'=> ['CoachController@update', $coach->id],'files'=>true]) !!}


            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['class'=>'form-control'])!!}
            </div>


            <div class="form-group">
                {!! Form::label('nationality', 'Nationality') !!}
                {!! Form::text('nationality', null, ['class'=>'form-control'])!!}
            </div>


            <div class="form-group">
                {!! Form::label('club_id', 'Club') !!}
                {!! Form::select('club_id',  $clubs, null, ['class'=>'form-control'])!!}
            </div>




            <div class="form-group">
                {!! Form::label('photo_id', 'Photo') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
            </div>




            <div class="form-group">
                {!! Form::submit('Edit coach', ['class'=>'btn btn-primary col-sm-3']) !!}
            </div>

            {!! Form::close() !!}







        </div>



    </div>



    <div class="row">

        @include('includes.form_error')


    </div>





@stop