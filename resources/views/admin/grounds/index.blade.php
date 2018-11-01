@extends('layouts.admin')





@section('content')



    @if(Session::has('deleted_ground'))
        <div class="alert alert-danger">

            <p class="bg-danger">{{session('deleted_ground')}}</p>
        </div>

    @endif


    @if(Session::has('created_ground'))
        <div class="alert alert-success">

            <p class="bg-success">{{session('created_ground')}}</p>
        </div>

    @endif



    @if(Session::has('updated_ground'))
        <div class="alert alert-info">

            <p class="bg-info">{{session('updated_ground')}}</p>
        </div>

    @endif



    <h2>Grounds</h2>


    <table class="table table-sm table-hover  table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>

        @if($grounds->count() > 0)


            @foreach($grounds as $ground)


                <tr>
                    <td>{{$ground->id}}</td>
                    <td> <img height="50" src="{{$ground->photo ? $ground->photo->file : 'http://placehold.it/400x400'}}" alt="" ></td>
                    <td><a href="{{route('grounds.edit', $ground->id)}}">{{$ground->name}}</a></td>
                    {{--<td>{{$ground->type}}</td>--}}


                    <td>{{$ground->created_at->diffForHumans()}}</td>
                    <td>{{$ground->updated_at->diffForHumans()}}</td>

                    <td>
                        <a href="{{route('grounds.edit',['id'=> $ground->id])}}" class=" col-sm-8 btn btn-info btn-circle"><i class="fa fa-wrench fa-fw"></i></a>
                    </td>


                    <td>
                        <a href="{{route('grounds.delete',['id'=>$ground->id])}}" class="col-sm-8 btn btn-danger btn-circle"><i class="fa fa-trash fa-fw"></i></a>
                    </td>



                </tr>

            @endforeach

        @else

            <th colspan="5" class="text-center">No any grounds</th>
        @endif



        </tbody>
    </table>


@stop