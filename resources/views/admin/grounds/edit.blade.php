@extends('layouts.admin')




@section('content')


    <h2>Edit Ground</h2>


    <div class="row">


        <div class="col-sm-3">


            <img src="{{$ground->photo ? $ground->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">


        </div>



        <div class="col-sm-9">


            {!! Form::model($ground, ['method'=>'PATCH', 'action'=> ['GroundController@update', $ground->id],'files'=>true]) !!}


            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['class'=>'form-control'])!!}
            </div>


       {{--     <div class="form-group">
                {!! Form::label('type_id', 'Type') !!}
                {!! Form::select('type_id',  $types, null, ['class'=>'form-control'])!!}
            </div>--}}




            <div class="form-group">
                {!! Form::label('photo_id', 'Photo') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
            </div>




            <div class="form-group">
                {!! Form::submit('Edit Ground', ['class'=>'btn btn-primary col-sm-3']) !!}
            </div>

            {!! Form::close() !!}







        </div>



    </div>



    <div class="row">

        @include('includes.form_error')


    </div>





@stop