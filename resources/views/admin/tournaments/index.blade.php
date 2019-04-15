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
            <th>Id</th>
            <th>Logo</th>
            <th>Name</th>
        </tr>
        </thead>
        <tbody>

        @if($tournaments->count() > 0)


            @foreach($tournaments as $key=> $tournament)
                <tr>
                    <td>
                        {{$key+1}}
                    </td>
                    <td>
                        <img height="50" src="{{$tournament->photo ? $tournament->photo->file : 'http://placehold.it/400x400'}}" alt="" >
                    </td>
                    <td><strong><h4>
                        {{$tournament->name}}
                    </h4></strong></td>
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
        <h5 class="modal-title"><strong>Tournament</strong></h5>
  </div>
  <div class="modal-body">
    {!! Form::open(['method'=>'POST', 'action'=> 'TournamentController@store','files'=>true]) !!}


                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class'=>'form-control','required'])!!}
                </div>




                <div class="form-group">
                    {!! Form::label('photo_id', 'Logo') !!}
                    {!! Form::file('photo_id', null, ['class'=>'form-control','required'])!!}
                </div>




                <div class="form-group">
                    {!! Form::submit('Add Tournament', ['class'=>'btn btn-primary col-sm-3']) !!}
                    {!! Form::button('Cancel', ['class'=>'btn btn-danger col-sm-3','data-dismiss'=>'modal']) !!}
                </div>

                {!! Form::close() !!}

</div>
<div class="modal-footer"></div>
</div>
</div>
</div>
{{-- End Add Modal --}}


@stop