@extends('layouts.admin')





@section('content')



    @if(Session::has('deleted_playerRankingOD'))
        <div class="alert alert-danger">

            <p class="bg-danger">{{session('deleted_playerRankingOD')}}</p>
    </div>

    @endif


    @if(Session::has('created_playerRankingOD'))
        <div class="alert alert-success">

            <p class="bg-success">{{session('created_playerRankingOD')}}</p>
        </div>

    @endif



    @if(Session::has('updated_playerRankingOD'))
        <div class="alert alert-info">

            <p class="bg-info">{{session('updated_playerRankingOD')}}</p>
        </div>

    @endif

    <a href=""  data-target="#addmodel" data-toggle="modal" class="btn btn-info" >Manage Ranking</a>

    <h2>Player Rankings</h2>


    <table class="table table-sm table-hover  table-striped">
        <thead class="">
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Club</th>
            <th>Role</th>
            <th>Points</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Edit</th>
            <th>Trash</th>

        </tr>
        </thead>
        <tbody>

        @if($playerRankingODs->count() > 0)


            @foreach($playerRankingODs as $playerRankingOD)


                <tr>
                    <td>{{$playerRankingOD->id}}</td>
                    <td> <img height="50" src="{{$playerRankingOD->player->photo ? $playerRankingOD->player->photo->file : 'http://placehold.it/400x400'}}" alt="" ></td>
                    <td><a href="">{{$playerRankingOD->player->name}}</a></td>
                    <td>{{$playerRankingOD->player->club->name}}</td>
                    <td>{{$playerRankingOD->player->role->name}}</td>
                    <td>{{$playerRankingOD->points}}</td>

                    <td>{{$playerRankingOD->created_at->diffForHumans()}}</td>
                    <td>{{$playerRankingOD->updated_at->diffForHumans()}}</td>

                    <td>
                        <a href="" class=" col-sm-8 btn btn-info btn-circle" data-toggle="modal" data-target="#addmodel1"><i class="fa fa-wrench fa-fw"></i></a>
                    </td>

                    <td>
                        <a href="" class="col-sm-8 btn btn-danger btn-circle" data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash fa-fw"></i></a>
                    </td>



                </tr>

            @endforeach

        @else

            <th colspan="5" class="text-center">No any Ranking for ODs</th>
        @endif



        </tbody>
    </table>

    <!--begin::DeleteModal-->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Warning
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <h5>
                    Are you Sure you Want To Delete?
                </h5>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="deleteid" name="">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Cancel
                </button>
                {!! Form::open(['method'=>'DELETE','action'=>['PlayerRankingODController@destroy',1] ]) !!}
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
        <h5 class="modal-title"><strong>Update Information</strong></h5>
  </div>
  <div class="modal-body">


       {!! Form::model($playerRankingODs, ['method'=>'PATCH', 'action'=> ['PlayerRankingODController@update', 0],'files'=>true]) !!}


            <div class="form-group">
                {!! Form::label('player_id', 'Player') !!}
                {!! Form::select('player_id', [''=>'Choose Player'] + $players, null, ['class'=>'form-control'])!!}
            </div>


            <div class="form-group">
                {!! Form::label('points', 'Points') !!}
                {!! Form::number('points', null, ['class'=>'form-control'])!!}
            </div>



            <div class="form-group">
                {!! Form::label('club_id', 'Club') !!}
                {!! Form::select('club_id', [''=>'Choose Club'] + $clubs, null, ['class'=>'form-control','disabled' =>'true'])!!}
            </div>




            <div class="form-group">
                {!! Form::label('role_id', 'Role') !!}
                {!! Form::select('role_id', [''=>'Choose Role'] + $roles, null, ['class'=>'form-control','disabled' =>'true'])!!}
            </div>





            <div class="form-group">
                {!! Form::submit('Edit Ranking', ['class'=>'btn btn-primary col-sm-3']) !!}
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
        <h5 class="modal-title"><strong>Coach</strong></h5>
  </div>
  <div class="modal-body">
    {!! Form::open(['method'=>'POST', 'action'=> 'PlayerRankingODController@store','files'=>true]) !!}


                <div class="form-group">
                    {!! Form::label('player_id', 'Player') !!}
                    {!! Form::select('player_id',$players, null, ['class'=>'form-control'])!!}
                </div>


                <div class="form-group">
                    {!! Form::label('points', 'Points') !!}
                    {!! Form::number('points', null, ['class'=>'form-control'])!!}
                </div>




                <div class="form-group">
                    {!! Form::label('club_id', 'Club') !!}
                    {!! Form::select('club_id', [''=>'Choose Club'] + $clubs, null, ['class'=>'form-control','disabled' =>'true'])!!}
                </div>


                <div class="form-group">
                    {!! Form::label('role_id', 'Role') !!}
                    {!! Form::select('role_id', [''=>'Choose Role'] + $roles, null, ['class'=>'form-control','disabled' =>'true'])!!}
                </div>





    <div class="form-group">
        {!! Form::submit('Add Ranking', ['class'=>'btn btn-primary col-sm-3']) !!}
    </div>

    {!! Form::close() !!}

</div>
<div class="modal-footer"></div>
</div>
</div>
</div>
{{-- End Add Modal --}}

@stop