@extends('layouts.admin')





@section('content')



    @if(Session::has('deleted_post'))
        <div class="alert alert-danger">

            <p class="bg-danger">{{session('deleted_post')}}</p>
        </div>

    @endif


    @if(Session::has('created_post'))
        <div class="alert alert-success">

            <p class="bg-success">{{session('created_post')}}</p>
        </div>

    @endif



    @if(Session::has('updated_post'))
        <div class="alert alert-info">

            <p class="bg-info">{{session('updated_post')}}</p>
        </div>

    @endif

    <a href=""  data-target="#addmodel" data-toggle="modal" class="btn btn-info" >Create Post</a>

    <h2>posts</h2>


    <table class="table table-sm table-hover  table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>

        @if($posts->count() > 0)


            @foreach($posts as $post)


                <tr>
                    <td>{{$post->id}}</td>
                    <td> <img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt="" ></td>
                    <td><a href="">{{$post->title}}</a></td>
                    {{--<td>{{$post->type}}</td>--}}
                    <td>{{str_limit($post->body, 30)}}</td>

                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>

                    <td>
                        <a href="" class=" col-sm-8 btn btn-info btn-circle" data-toggle="modal" data-target="#addmodel1"><i class="fa fa-wrench fa-fw"></i></a>
                    </td>


                    <td>
                        <a href="" class="col-sm-8 btn btn-danger btn-circle" data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash fa-fw"></i></a>
                    </td>



                </tr>

            @endforeach

        @else

            <th colspan="5" class="text-center">No any posts</th>
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


       
            {!! Form::model($post, ['method'=>'PATCH', 'action'=> ['PostController@update', $post->id],'files'=>true]) !!}


            <div class="form-group">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', null, ['class'=>'form-control'])!!}
            </div>


            {{--<div class="form-group">
                {!! Form::label('type_id', 'Type') !!}
                {!! Form::select('type_id', [''=>'Choose Type'] + $types, null, ['class'=>'form-control'])!!}
            </div>--}}



            <div class="form-group">
                {!! Form::label('photo_id', 'Image') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
            </div>




            <div class="form-group">
                {!! Form::label('body', 'Description') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control'])!!}
            </div>


            <div class="form-group">
                {!! Form::submit('Edit Post', ['class'=>'btn btn-primary col-sm-3']) !!}
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
        <h3 class="modal-title"><strong>Post</strong></h3>
  </div>
  <div class="modal-body">
    {!! Form::open(['method'=>'POST', 'action'=> 'PostController@store','files'=>true]) !!}


            <div class="form-group">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', null, ['class'=>'form-control'])!!}
            </div>


            {{--<div class="form-group">
                {!! Form::label('type_id', 'Type') !!}
                {!! Form::select('type_id', [''=>'Choose Type'] + $types, null, ['class'=>'form-control'])!!}
            </div>--}}



            <div class="form-group">
                {!! Form::label('photo_id', 'Image') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
            </div>




            <div class="form-group">
                {!! Form::label('body', 'Description') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control'])!!}

            </div>

                <div class="form-group">
                    {!! Form::submit('Add Post', ['class'=>'btn btn-primary col-sm-3']) !!}
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