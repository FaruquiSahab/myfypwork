@extends('layouts.admin')





@section('content')





    @if(Session::has('deleted_player'))
        <div class="alert alert-danger">

        <p class="bg-danger">{{session('deleted_player')}}</p>
    </div>

    @endif


    @if(Session::has('created_player'))
        <div class="alert alert-success">

            <p class="bg-success">{{session('created_player')}}</p>
        </div>

    @endif



    @if(Session::has('updated_player'))
        <div class="alert alert-info">

            <p class="bg-info">{{session('updated_player')}}</p>
        </div>

    @endif

    <a href=""  data-target="#addmodel" data-toggle="modal" class="btn btn-info" >Add Player</a>

    <h2>Players</h2>


    <table class="table table-sm table-hover  table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Age</th>
            <th>Date of Birth</th>
            <th>Club</th>
            <th>Role</th>
            <th>Batting Style</th>
            <th>Bowling Style</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>

        @if($players->count() > 0)


            @foreach($players as $player)


                <tr>
                    <td>{{$player->id}}</td>
                    <td> <img height="50" src="{{$player->photo ? $player->photo->file : 'http://placehold.it/400x400'}}" alt="" ></td>
                    <td><a href="">{{$player->name}}</a></td>
                    <td>{{$player->age}}</td>
                    <td>{{$player->date_of_birth}}</td>
                    <td>{{$player->club->name}}</td>
                    <td>{{$player->role->name}}</td>
                    <td>{{$player->batting_style ? $player->batting_style->name : '-'}}</td>
                    <td>{{$player->bowling_style ? $player->bowling_style->name : '-'}}</td>



                    <td>{{$player->created_at->diffForHumans()}}</td>
                    <td>{{$player->updated_at->diffForHumans()}}</td>

                    <td>
                        <a href="" class="col-sm-8 btn btn-info btn-circle" data-toggle="modal" data-target="#addmodel1"><i class="fa fa-wrench fa-fw"></i></a>
                    </td>


                    <td>
                        <a href="" class="col-sm-8 btn btn-danger btn-circle" data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash fa-fw"></i></a>
                    </td>



                </tr>

            @endforeach

        @else

            <th colspan="5" class="text-center">No any players</th>
        @endif



        </tbody>
    </table>


    <!--begin::DeleteModal-->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">
                    Warning
                </h3>
            </div>
            <div class="modal-body">
                <h3>
                    Are you Sure you Want To Delete?
                </h3>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="deleteid" name="">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Cancel
                </button>
                
                <button type="submit" id="showtoast"  class="btn btn-danger delete" data-dismiss="modal">
                    Delete
                </button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!--end::DeleteModal-->


{{-- Edit Modal Start --}}
<div class="modal" tabindex="-1" role="dialog" id="addmodel1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title"><strong>Update Information</strong></h3>
  </div>
  <div class="modal-body">


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
            <div class="form-group">
            {!! Form::button('Cancel', ['class'=>'btn btn-danger col-sm-3', 'data-dismiss'=>'modal']) !!}
        </div>

            {!! Form::close() !!}

</div>
<div class="modal-footer"></div>
</div>
</div>
</div>
{{-- Edit Modal Ends --}}



{{-- Add Modal Starts --}}
<div class="modal" tabindex="-1" role="dialog" id="addmodel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title"><strong>Coach</strong></h3>
  </div>
  <div class="modal-body">
    {!! Form::open(['method'=>'POST', 'action'=> 'PlayerController@store','files'=>true]) !!}


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
        {!! Form::submit('Add Player', ['class'=>'btn btn-primary col-sm-3']) !!}
    </div>
    <div class="form-group">
            {!! Form::button('Cancel', ['class'=>'btn btn-danger col-sm-3', 'data-dismiss'=>'modal']) !!}
        </div>

    {!! Form::close() !!}

</div>
<div class="modal-footer"></div>
</div>
</div>
</div>
{{-- End Add Modal --}}


@stop