@extends('layouts.admin')





@section('content')



@if(Session::has('deleted_club'))
<div class="alert alert-danger">

    <p class="bg-danger">{{session('deleted_club')}}</p>
</div>

@endif


@if(Session::has('created_club'))
<div class="alert alert-success">

    <p class="bg-success">{{session('created_club')}}</p>
</div>

@endif



@if(Session::has('updated_club'))
<div class="alert alert-info">

    <p class="bg-info">{{session('updated_club')}}</p>
</div>

@endif

<a href=""  data-target="#addmodel" data-toggle="modal" class="btn btn-info" >Add Club</a>

<h1>Clubs</h1>


<table class="table table-sm table-hover  table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Level</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

        @if($clubs->count() > 0)


        @foreach($clubs as $club)


        <tr>
            <td>{{$club->id}}</td>
            <td> <img height="50" src="{{$club->photo ? $club->photo->file : 'http://placehold.it/400x400'}}" alt="" ></td>
            <td><a href="">{{$club->name}}</a></td>
            <td>{{$club->level->name}}</td>

            <td>
                <a href="{{-- {{route('clubs.edit',['id'=> $club->id])}} --}}" class=" col-sm-8 btn btn-info btn-circle idedit" data-toggle="modal" data-target="#addmodel1" data-id="{{ $club->id }}"
                    data-name="{{$club->name}}"
                    data-level="{{$club->level_id}}">
                    <i class="fa fa-wrench fa-fw"></i>
                </a>
            </td>


            <td>
                <a href="{{-- {{route('clubs.delete',['id'=>$club->id])}} --}}" class="col-sm-8 btn btn-danger btn-circle iddelete" data-id="{{ $club->id }}" title="Delete" data-toggle="modal" data-target="#deletemodal">
                    <i class="fa fa-trash fa-fw"></i>
                </a>
            </td>



        </tr>

        @endforeach

        @else

        <th colspan="5" class="text-center">No any clubs</th>
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
                <h5>
                    Are you Sure you Want To Delete?
                </h5>
                
            </div>
                <div class="modal-footer">
                    <form method="POST" action="{{ route('clubs.delete') }}">
                        <input type="hidden" id="deleteclubid" name="id">
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger col-sm-3', 'id'=>'buttonEdit','data-dismiss'=>'modal']) !!}
                        {!! Form::button('Cancel', ['class'=>'btn btn-info col-sm-3']) !!}
                    </form>
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


        {!! Form::open(['action'=> 'ClubController@update', 'method'=>'PATCH', 'files'=>true]) !!}

        <input type="hidden" name="id" id="clubid">
        <div class="form-group">
            {!! Form::label('', 'Name') !!}
            {!! Form::text('name', null, ['class'=>'form-control','id'=>'nameEdit'])!!}
        </div>


        <div class="form-group">
            {!! Form::label('level_id', 'Level') !!}
            {!! Form::select('level_id',  $levels, null, ['class'=>'form-control','id'=>'levelEdit'])!!}
        </div>


        <div class="form-group">
            {!! Form::label('', 'Photo') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control','id'=>'photo_idEdit'])!!}
        </div>

        <div class="form-group">
            {!! Form::submit('Edit Club', ['class'=>'btn btn-primary col-sm-3', 'id'=>'buttonEdit']) !!}
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
        <h3 class="modal-title"><strong>Create Club</strong></h3>
  </div>
  <div class="modal-body">

    {!! Form::open(['action'=> 'ClubController@store', 'method'=>'POST', 'files'=>true, 'id'=>'addForm']) !!}

    <div class="form-group">
        {!! Form::label('', 'Name') !!}
        {!! Form::text('name', null, ['class'=>'form-control', 'id'=>'name'])!!}
    </div>


    <div class="form-group">
        {!! Form::label('level_id', 'Level') !!}
        {!! Form::select('level_id', $levels, null, ['placeholder'=>'Select Level','class'=>'form-control'])!!}
    </div>


    <div class="form-group">
        {!! Form::label('', 'Logo') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control','id'=>'photo_id'])!!}
    </div>




    <div class="form-group">
        {!! Form::submit('Create Club', ['class'=>'btn btn-primary col-sm-3', 'id'=>'addClub' ]) !!}
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

@section('scripts')

</script>
    <script type="text/javascript">
        $(document).ready(function(){

            $('.idedit').on('click',function(){
                console.log('clubEdit Enter');
                $('#clubid').val($(this).data('id'));
                $('#nameEdit').val($(this).data('name'));
                $('#levelEdit').val($(this).data('level'));
            });



            $('.iddelete').on('click',function(){
                console.log('clubDelete Enter');
                $('#deleteclubid').val($(this).data('id'));
            });
        });
    </script>
@stop