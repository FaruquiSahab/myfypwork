@extends('layouts.admin')





@section('content')



    @if(Session::has('deleted_teamRankingOD'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <p class="bg-danger">{{session('deleted_teamRankingOD')}}</p>
    </div>

    @endif


    @if(Session::has('created_teamRankingOD'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <p class="bg-success">{{session('created_teamRankingOD')}}</p>
        </div>

    @endif



    @if(Session::has('updated_teamRankingOD'))
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <p class="bg-info">{{session('updated_teamRankingOD')}}</p>
        </div>

    @endif

    <a href=""  data-target="#addmodel" data-toggle="modal" class="btn btn-info" >Add Ranking</a>

    <h2>Team Rankings</h2>


    <table class="table table-sm table-hover  table-striped">
        <thead class="">
        <tr>
            <th>ID</th>
            <th>Logo</th>
            <th>Club</th>
            <th>Points</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Edit</th>
            <th>Trash</th>

        </tr>
        </thead>
        <tbody>

        @if($teamRankingODs->count() > 0)


            @foreach($teamRankingODs as $teamRankingOD)


                <tr>
                    <td>{{$teamRankingOD->id}}</td>
                    {{-- <td> <img height="50" src="{{$teamRankingOD->club->photo ? $teamRankingODclub->photo->file : 'http://placehold.it/400x400'}}" alt="" ></td> --}}
                    <td>{{$teamRankingOD->club->name}}</td>
                    <td>{{$teamRankingOD->points}}</td>

                    <td>{{$teamRankingOD->created_at->diffForHumans()}}</td>
                    <td>{{$teamRankingOD->updated_at->diffForHumans()}}</td>

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


       {!! Form::model($teamRankingODs, ['method'=>'PATCH', 'action'=> ['TeamRankingODController@update', 0],'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('club_id', 'Club') !!}
                {!! Form::select('club_id', [''=>'Choose Club'] + $clubs, null, ['class'=>'form-control','disabled' =>'true'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('points', 'Points') !!}
                {!! Form::number('points', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::submit('Edit Ranking', ['class'=>'btn btn-primary col-sm-3']) !!}
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

    {!! Form::open(['method'=>'POST', 'action'=> 'TeamRankingODController@store','files'=>true]) !!}


                <div class="form-group">
                    {!! Form::label('club_id', 'Club') !!}
                    {!! Form::select('club_id', [''=>'Choose Club'] + $clubs, null, ['class'=>'form-control'])!!}
                </div>




                <div class="form-group">
                    {!! Form::label('points', 'Points') !!}
                    {!! Form::number('points', null, ['class'=>'form-control'])!!}
                </div>





    <div class="form-group">
        {!! Form::submit('Add Ranking', ['class'=>'btn btn-primary col-sm-3']) !!}
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