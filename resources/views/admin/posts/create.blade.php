@extends('layouts.admin')




@section('content')




    <h2>Create post</h2>


    <div class="row">


        <div class="col-sm-8">

            <div class="panel-body">

                {!! Form::open(['method'=>'POST', 'action'=> 'PostController@store','files'=>true]) !!}


                </div>

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
                    {!! Form::submit('Add Post', ['class'=>'btn btn-primary col-sm-3']) !!}
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>


    @include('includes.form_error')

@stop