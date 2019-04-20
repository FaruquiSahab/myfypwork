@extends('layouts.admin')





@section('content')
    @if(Session::has('deleted_coach'))
        <div class="alert alert-danger">
        <p class="bg-danger">{{session('deleted_coach')}}</p>
    </div>
    @endif
    @if(Session::has('created_coach'))
        <div class="alert alert-success">
            <p class="bg-success">{{session('created_coach')}}</p>
        </div>
    @endif
    @if(Session::has('updated_coach'))
        <div class="alert alert-info">
            <p class="bg-info">{{session('updated_coach')}}</p>
        </div>
    @endif
    <a href=""  data-target="#addmodel" data-toggle="modal" class="btn btn-info" >Register Coach</a>
    <h1>Coaches</h1>
    <table class="table table-sm table-hover  table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Club</th>
            <th>Nationality</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @if($coaches->count() > 0)
            @foreach($coaches as $coach)
                <tr>
                    <td>{{$coach->id}}</td>
                    <td> <img height="50" src="{{$coach->photo ? $coach->photo->file : 'http://placehold.it/400x400'}}" alt="" ></td>
                    <td><a href="{{route('coaches.edit', $coach->id)}}">{{$coach->name}}</a></td>
                    <td>{{$coach->club->name}}</td>
                    <td>{{$coach->nationality}}</td>
                    <td>
                        <a href="{{-- {{route('coaches.edit',['id'=> $coach->id])}} --}}" class=" col-sm-8 btn btn-info btn-circle" data-toggle="modal" data-target="#addmodel1" data-id="{{ $coach->id }}" data-name="{{ $coach->name }}" data-nationality="{{ $coach->nationality }}" data-club_id="{{ $coach->club_id }}" ><i class="fa fa-wrench fa-fw"></i></a>
                    </td>
                    <td>
                        <a href="{{-- {{route('coaches.delete',['id'=>$coach->id])}} --}}" class="col-sm-8 btn btn-danger btn-circle" data-id="{{ $coach->id }}" title="Delete" data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash fa-fw"></i></a>
                    </td>
                </tr>
            @endforeach
        @else
            <th colspan="5" class="text-center">No any coaches</th>
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
                {!! Form::open(['method'=>'DELETE', 'id'=>'deleteform', 'action'=> ['CoachController@destroy', 0],'files'=>true]) !!}
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Cancel
                </button>
                <button type="submit" class="btn btn-warning">
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


       {!! Form::open(['method'=>'PATCH', 'id'=>'updateform', 'action'=> ['CoachController@update', 0],'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('', 'Name') !!}
                {!! Form::text('name', null, ['class'=>'form-control','id'=>'name1'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('', 'Nationality') !!}
                {!! Form::text('nationality', null, ['class'=>'form-control','id'=>'nationality1'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('', 'Club') !!}
                <select class="form-control" name="club_id" id="club_id1">
                    <option value selected disabled>Select Club</option>
                    @foreach($clubs as $club)
                        <option value="{{ $club->id }}">{{ $club->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {!! Form::label('', 'Photo') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control','id'=>'photo_id1'])!!}
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
    {!! Form::open(['method'=>'POST', 'action'=> 'CoachController@store','files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::label('nationality', 'Nationality') !!}
        {!! Form::text('nationality', null, ['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::label('club_id', 'Club') !!}
        {{-- {!! Form::select('club_id', [''=>'Choose Club'] + $clubs, null, ['class'=>'form-control'])!!} --}}
        <select class="form-control" name="club_id">
            <option value selected disabled>Select Club</option>
            @foreach($clubs as $club)
                <option value="{{ $club->id }}">{{ $club->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        {!! Form::label('photo_id', 'Logo') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create coach', ['class'=>'btn btn-primary col-sm-3']) !!}
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
    <script type="text/javascript">
        $('table').DataTable();
        $(document).on('click','.btn-info',function(){
            $('#name1').val($(this).data('name'));
            $('#nationality1').val($(this).data('nationality'));
            $('#club_id1').val($(this).data('club_id'));
            var id = $(this).data('id');
            $('#updateform').attr('action','{{ url('admin/coach/update/') }}/'+ id);
        });
        $(document).on('click','.btn-danger',function(){
            var id = $(this).data('id');
            $('#deleteform').attr('action','{{ url('admin/coach/delete/') }}/'+ id);
        });
    </script>
@stop