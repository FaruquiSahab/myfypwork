@extends('layouts.admin')




@section('content')


    <table class="table table-sm table-hover  table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Post</th>
            <th>Name</th>
            <th>User</th>
        </tr>
        </thead>
        <tbody>

{{--
        @if($posts->count() > 0)--}}


            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->post}}</td>
                    <td>{{$post->name}}</td>
                    <td>{{$post->user}}</td>


                </tr>

            @endforeach

        {{--@else--}}

            {{--<th colspan="5" class="text-center">No any Insertion</th>--}}
    {{--    @endif--}}
{{----}}

        </tbody>
    </table>


<br>



    <div class="panel panel-default">
        <div class="panel-heading">
            Insertion
        </div>

        <div class="panel-body">
    {!! Form::open(['method'=>'POST', 'action'=> 'UserCheckController@store','files'=>true]) !!}


    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, ['class'=>'form-control'])!!}
    </div>


    <div class="form-group">
        {!! Form::label('post', 'Post') !!}
        {!! Form::text('post', null, ['class'=>'form-control'])!!}
    </div>


    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::label('user', 'User') !!}
        {!! Form::text('user', null, ['class'=>'form-control'])!!}
    </div>


    <div class="form-group">
        {!! Form::submit('Insertion', ['class'=>'btn btn-primary col-sm-3']) !!}
    </div>

        </div>
    </div>

@stop