@extends('layouts.admin')




@section('content')




    <h2>Add Umpire</h2>


    <div class="row">


        <div class="col-sm-8">

            <div class="panel-body">

    {!! Form::open(['method'=>'POST', 'action'=> 'UmpireController@store','files'=>true]) !!}


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
        {!! Form::submit('Add Umpire', ['class'=>'btn btn-primary col-sm-3']) !!}
    </div>

    {!! Form::close() !!}

            </div>
</div>
    </div>


    @include('includes.form_error')

@stop