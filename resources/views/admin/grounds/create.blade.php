@extends('layouts.admin')




@section('content')




    <h2>Create Ground</h2>


    <div class="row">


        <div class="col-sm-8">

            <div class="panel-body">

                {!! Form::open(['method'=>'POST', 'action'=> 'GroundController@store','files'=>true]) !!}


                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class'=>'form-control'])!!}
                </div>


                {{--<div class="form-group">
                    {!! Form::label('type_id', 'Type') !!}
                    {!! Form::select('type_id', [''=>'Choose Type'] + $types, null, ['class'=>'form-control'])!!}
                </div>--}}



                <div class="form-group">
                    {!! Form::label('photo_id', 'Logo') !!}
                    {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
                </div>




                <div class="form-group">
                    {!! Form::submit('Add Ground', ['class'=>'btn btn-primary col-sm-3']) !!}
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>


    @include('includes.form_error')

@stop