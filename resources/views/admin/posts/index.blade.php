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
                    <td><a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a></td>
                    {{--<td>{{$post->type}}</td>--}}
                    <td>{{str_limit($post->body, 30)}}</td>

                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>

                    <td>
                        <a href="{{route('posts.edit',['id'=> $post->id])}}" class=" col-sm-8 btn btn-info btn-circle"><i class="fa fa-wrench fa-fw"></i></a>
                    </td>


                    <td>
                        <a href="{{route('posts.delete',['id'=>$post->id])}}" class="col-sm-8 btn btn-danger btn-circle"><i class="fa fa-trash fa-fw"></i></a>
                    </td>



                </tr>

            @endforeach

        @else

            <th colspan="5" class="text-center">No any posts</th>
        @endif



        </tbody>
    </table>


@stop