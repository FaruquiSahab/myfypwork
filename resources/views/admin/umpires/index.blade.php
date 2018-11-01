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
                    <td><a href="{{route('umpires.edit', $umpire->id)}}">{{$umpire->name}}</a></td>
                    <td>{{$umpire->nationality}}</td>
                    <td>{{$umpire->created_at->diffForHumans()}}</td>
                    <td>{{$umpire->updated_at->diffForHumans()}}</td>

                    <td>
                        <a href="{{route('umpires.edit',['id'=> $umpire->id])}}" class=" col-sm-8 btn btn-info btn-circle"><i class="fa fa-wrench fa-fw"></i></a>
                    </td>



                    <td>
                        <a href="{{route('umpires.delete',['id'=>$umpire->id])}}" class="col-sm-8 btn btn-danger btn-circle"><i class="fa fa-trash fa-fw"></i></a>
                    </td>



                </tr>

            @endforeach

        @else

            <th colspan="5" class="text-center">No any umpires</th>
        @endif



        </tbody>
    </table>


@stop