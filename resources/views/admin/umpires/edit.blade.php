@extends('layouts.admin')




@section('content')


    <h1>Edit Umpire</h1>


    <div class="row">


        <div class="col-sm-3">


            <img src="{{$umpire->photo ? $umpire->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">


        </div>



        <div class="col-sm-9">


            {!! Form::model($umpire, ['method'=>'PATCH', 'action'=> ['UmpireController@update', $umpire->id],'files'=>true]) !!}


            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['class'=>'form-control'])!!}
            </div>


            <div class="form-group">
                {!! Form::label('nationality', 'Nationality') !!}
                {!! Form::text('nationality', null, ['class'=>'form-control'])!!}
            </div>




            <div class="form-group">
                {!! Form::label('photo_id', 'Photo') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
            </div>




            <div class="form-group">
                {!! Form::submit('Edit Umpire', ['class'=>'btn btn-primary col-sm-3']) !!}
            </div>

            {!! Form::close() !!}







        </div>



    </div>



    <div class="row">

        @include('includes.form_error')


    </div>





@stop