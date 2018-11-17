@extends('layouts.admin')





@section('content')



    @if(Session::has('deleted_tournament'))
        <div class="alert alert-danger">

            <p class="bg-danger">{{session('deleted_tournament')}}</p>
        </div>

    @endif


    @if(Session::has('created_tournament'))
        <div class="alert alert-success">

            <p class="bg-success">{{session('created_tournament')}}</p>
        </div>

    @endif



    @if(Session::has('updated_tournament'))
        <div class="alert alert-info">

            <p class="bg-info">{{session('updated_tournament')}}</p>
        </div>

    @endif

    <a href=""  data-target="#addmodel" data-toggle="modal" class="btn btn-info" >New Tournament</a>

    <h2>Tournaments</h2>


    <table class="table table-sm table-hover  table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Logo</th>
            <th>Name</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>

        @if($tournaments->count() > 0)


            @foreach($tournaments as $tournament)


                <tr>
                    <td>{{$tournament->id}}</td>
                    <td> <img height="50" src="{{$tournament->photo ? $tournament->photo->file : 'http://placehold.it/400x400'}}" alt="" ></td>
                    <td><a href="">{{$tournament->name}}</a></td>
                    {{--<td>{{$Tournament->type}}</td>--}}


                    <td>{{$tournament->created_at->diffForHumans()}}</td>
                    <td>{{$tournament->updated_at->diffForHumans()}}</td>

                    <td>
                        <a href="" class=" col-sm-8 btn btn-info btn-circle" data-toggle="modal" data-target="#addmodel1"><i class="fa fa-pencil fa-fw"></i></a>
                    </td>


                    <td>
                        <a href="" class="col-sm-8 btn btn-danger btn-circle" data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash fa-fw"></i></a>
                    </td>



                </tr>

            @endforeach

        @else

            <th colspan="5" class="text-center">No any Tournaments</th>
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


       {!! Form::model($tournament, ['method'=>'PATCH', 'action'=> ['TournamentController@update', $tournament->id],'files'=>true]) !!}


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
                {!! Form::submit('Edit Tournament', ['class'=>'btn btn-primary col-sm-3']) !!}
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
    {!! Form::open(['method'=>'POST', 'action'=> 'TournamentController@store','files'=>true]) !!}


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
                    {!! Form::submit('Add Tournament', ['class'=>'btn btn-primary col-sm-3']) !!}
                </div>

                {!! Form::close() !!}

</div>
<div class="modal-footer"></div>
</div>
</div>
</div>
{{-- End Add Modal --}}


@stop