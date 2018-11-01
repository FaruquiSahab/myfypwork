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



    <h1>Clubs</h1>


    <table class="table table-sm table-hover  table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Level</th>
            <th>Created at</th>
            <th>Updated at</th>
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
                    <td><a href="{{route('clubs.edit', $club->id)}}">{{$club->name}}</a></td>
                    <td>{{$club->level->name}}</td>


                    <td>{{$club->created_at->diffForHumans()}}</td>
                    <td>{{$club->updated_at->diffForHumans()}}</td>

                    <td>
                        <a href="{{route('clubs.edit',['id'=> $club->id])}}" class=" col-sm-8 btn btn-info btn-circle"><i class="fa fa-wrench fa-fw"></i></a>
                    </td>


                    <td>
                        <a href="{{route('clubs.delete',['id'=>$club->id])}}" class="col-sm-8 btn btn-danger btn-circle"><i class="fa fa-trash fa-fw"></i></a>
                    </td>



                </tr>

            @endforeach

        @else

            <th colspan="5" class="text-center">No any clubs</th>
        @endif



        </tbody>
    </table>


@stop