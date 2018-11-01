@extends('layouts.admin')




@section('content')


    <h2>Edit Post</h2>


    <div class="row">


        <div class="col-sm-3">


            <img src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">


        </div>



        <div class="col-sm-9">


            {!! Form::model($post, ['method'=>'PATCH', 'action'=> ['PostController@update', $post->id],'files'=>true]) !!}


            <div class="form-group">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', null, ['class'=>'form-control'])!!}
            </div>


            {{--<div class="form-group">
                {!! Form::label('type_id', 'Type') !!}
                {!! Form::select('type_id', [''=>'Choose Type'] + $types, null, ['class'=>'form-control'])!!}
            </div>--}}



            <div class="form-group">
                {!! Form::label('photo_id', 'Image') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
            </div>




            <div class="form-group">
                {!! Form::label('body', 'Description') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control'])!!}
            </div>


            <div class="form-group">
                {!! Form::submit('Edit Post', ['class'=>'btn btn-primary col-sm-3']) !!}
            </div>

            {!! Form::close() !!}







        </div>



    </div>



    <div class="row">

        @include('includes.form_error')


    </div>





@stop