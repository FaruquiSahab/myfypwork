@extends('layouts.admin')




@section('content')




    <h1>Create Club</h1>


    <div class="row">


        <div class="col-sm-8">

            <div class="panel-body">

    {!! Form::open(['method'=>'POST', 'action'=> 'ClubController@store','files'=>true]) !!}


    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class'=>'form-control'])!!}
    </div>


                <div class="form-group">
                    {!! Form::label('level_id', 'Level') !!}
                    {!! Form::select('level_id', [''=>'Choose Level'] + $levels, null, ['class'=>'form-control'])!!}
                </div>



    <div class="form-group">
        {!! Form::label('photo_id', 'Logo') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
    </div>




    <div class="form-group">
        {!! Form::submit('Create Club', ['class'=>'btn btn-primary col-sm-3']) !!}
    </div>

    {!! Form::close() !!}

            </div>
</div>
    </div>


    @include('includes.form_error')

@stop