@extends('layouts.admin')





@section('content')



    @if(Session::has('deleted_umpire'))
        <div class="alert alert-danger">

        <p class="bg-danger">{{session('deleted_umpire')}}</p>
    </div>

    @endif


    @if(Session::has('created_umpire'))
        <div class="alert alert-success">

            <p class="bg-success">{{session('created_umpire')}}</p>
        </div>

    @endif



    @if(Session::has('updated_umpire'))
        <div class="alert alert-info">

            <p class="bg-info">{{session('updated_umpire')}}</p>
        </div>

    @endif

<a href=""  data-target="#addmodel" data-toggle="modal" class="btn btn-info" >New Umpire</a>

    <h2>Umpires</h2>


    <table class="table table-sm table-hover  table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Nationality</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>

        @if($umpires->count() > 0)


            @foreach($umpires as $umpire)


                <tr>
                    <td>{{$umpire->id}}</td>
                    <td> <img height="50" src="{{$umpire->photo ? $umpire->photo->file : 'http://placehold.it/400x400'}}" alt="" ></td>
                    <td><a href="">{{$umpire->name}}</a></td>
                    <td>{{$umpire->nationality}}</td>
                    <td>{{$umpire->created_at->diffForHumans()}}</td>
                    <td>{{$umpire->updated_at->diffForHumans()}}</td>

                    <td>
                        <a href="" class=" col-sm-8 btn btn-info btn-circle" data-toggle="modal" data-target="#addmodel1"><i class="fa fa-wrench fa-fw"></i></a>
                    </td>



                    <td>
                        <a href="" class="col-sm-8 btn btn-danger btn-circle" data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash fa-fw"></i></a>
                    </td>



                </tr>

            @endforeach

        @else

            <th colspan="5" class="text-center">No any umpires</th>
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


       {!! Form::model($umpire, ['method'=>'PATCH', 'action'=> ['UmpireController@update', $umpire->id],'files'=>true]) !!}


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
                {!! Form::submit('Edit Umpire', ['class'=>'btn btn-primary col-sm-3']) !!}
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