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



    <h1>Coaches</h1>


    <table class="table table-sm table-hover  table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Club</th>
            <th>Nationality</th>
            <th>Created at</th>
            <th>Updated at</th>
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
                    <td>{{$coach->created_at->diffForHumans()}}</td>
                    <td>{{$coach->updated_at->diffForHumans()}}</td>

                    <td>
                        <a href="{{route('coaches.edit',['id'=> $coach->id])}}" class=" col-sm-8 btn btn-info btn-circle"><i class="fa fa-wrench fa-fw"></i></a>
                    </td>



                    <td>
                        <a href="{{route('coaches.delete',['id'=>$coach->id])}}" class="col-sm-8 btn btn-danger btn-circle"><i class="fa fa-trash fa-fw"></i></a>
                    </td>



                </tr>

            @endforeach

        @else

            <th colspan="5" class="text-center">No any coaches</th>
        @endif



        </tbody>
    </table>


@stop