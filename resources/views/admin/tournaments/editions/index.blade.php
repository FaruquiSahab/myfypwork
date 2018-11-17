@extends('layouts.admin')





@section('content')



    @if(Session::has('deleted_tournament'))
        <div class="alert alert-danger">

            <p class="bg-danger">{{session('deleted_tournament')}}</p>
        </div>

    @endif


    @if(Session::has('created_edition'))
        <div class="alert alert-success">

            <p class="bg-success">{{session('created_edition')}}</p>
        </div>

    @endif



    @if(Session::has('updated_tournament'))
        <div class="alert alert-info">

            <p class="bg-info">{{session('updated_tournament')}}</p>
        </div>

    @endif

    <a href=""  data-target="#addmodel" data-toggle="modal" class="btn btn-info" >New Edition</a>

    <h2>Tournaments Edition</h2>


    <table class="table table-sm table-hover  table-striped">
        <thead>
        <tr>

            <th>ID</th>
            <th>Logo</th>
            <th>Name</th>
            <th>Edition</th>
            <th>No of Teams</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        @if($tournaments->count() > 0)


            @foreach($tournaments as $key => $tournament)


                <tr>
                    <td>{{$tournament->id}}</td>
                    <td> <img height="50" src="{{$tournament->photo ? $tournament->photo->file : 'http://placehold.it/400x400'}}" alt="" ></td>
                    <td><a href="{{route('edition.show', $tournament->id)}}">{{$tournament->tournament->name}}</a></td>
                    {{--<td>{{$Tournament->type}}</td>--}}

                    <td>
                        {{ $tournament->edition }}
                    </td>

                    <td>{{ $tournament->number_of_teams }}</td>


                    <td>
                    	<a href="" class=" col-sm-8 btn btn-info btn-circle"><i class="fa fa-pencil fa-fw"></i></a>
                        <a href="" class="col-sm-8 btn btn-danger btn-circle"><i class="fa fa-trash fa-fw"></i></a>
                    </td>



                </tr>

            @endforeach

        @else
            <th colspan="5" class="text-center">No Edition Yet</th>
        @endif


        </tbody>
    </table>

    <!--begin::DeleteModal-->
{{-- <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</div> --}}
<!--end::DeleteModal-->


{{-- Edit Modal Start --}}
{{-- <div class="modal" tabindex="-1" role="dialog" id="addmodel1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title"><strong>Update Information</strong></h3>
  </div>
  <div class="modal-body">


       {!! Form::model($coach, ['method'=>'PATCH', 'action'=> ['CoachController@update', $coach->id],'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('', 'Name') !!}
                {!! Form::text('name', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('', 'Nationality') !!}
                {!! Form::text('nationality', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('', 'Club') !!}
                {!! Form::select('club_id',  $clubs, null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('', 'Photo') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::submit('Edit coach', ['class'=>'btn btn-primary col-sm-3']) !!}
            </div>
            <div class="form-group">
            {!! Form::button('Cancel', ['class'=>'btn btn-danger col-sm-3', 'data-dismiss'=>'modal']) !!}
        </div>
            {!! Form::close() !!}

</div>
<div class="modal-footer"></div>
</div>
</div>
</div> --}}
{{-- Edit Modal Ends --}}



{{-- Add Modal Starts --}}
<div class="modal" tabindex="-1" role="dialog" id="addmodel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title"><strong>Coach</strong></h3>
  </div>
  <div class="modal-body">
    
    {!! Form::open(['method'=>'POST', 'action'=> 'TournamentReferenceController@store','files'=>true]) !!}


                <div class="form-group">
                    {!! Form::label('photo_id', 'Logo') !!}
                    {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
                </div>
                

                <div class="form-group">
                    {!! Form::label('tournament_id', 'Tournament') !!}
                    {!! Form::select('tournament_id', $tournamentss, null, ['placeholder'=>'Select a Tournament', 'class'=>'form-control', 'name'=>'tournament_id','id'=>'tournamentSelect', 'required' ])!!}
                </div>

                <div class="form-group">
                    {!! Form::label('tournament_type_id', 'Tournament') !!}
                    {!! Form::select('tournament_id', $m_type, null, ['placeholder'=>'Match Type', 'class'=>'form-control', 'name'=>'tournament_type_id','id'=>'TypeSelect', 'required'])!!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('tournament_format_id', 'Tournament') !!}
                    {!! Form::select('tournament_id', $t_format, null, ['placeholder'=>'Tournament Format', 'class'=>'form-control', 'name'=>'tournament_format_id','id'=>'formatSelect', 'required'])!!}
                </div>

                <div class="form-group">
                    {!! Form::label('number_of_teams', 'Num of Teams') !!}
                    {!! Form::number('number_of_teams', null, ['class'=>'form-control', 'min'=>'0', 'required'])!!}
                </div>




                <div class="form-group">
                    {!! Form::submit('Add Tournament', ['class'=>'btn btn-primary col-sm-3']) !!}
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