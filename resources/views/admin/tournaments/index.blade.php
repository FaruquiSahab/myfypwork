@extends('layouts.admin')





@section('content')



    @if(Session::has('deleted_tournament'))
        <div class="alert alert-danger">

            <p class="bg-danger">{{session('deleted_tournament')}}</p>
        </div>

    @endif


    @if(Session::has('created_tournament'))
        <div class="alert alert-success">

            <p class="bg-success">{{session('created_tournament')}}</p>
        </div>

    @endif



    @if(Session::has('updated_tournament'))
        <div class="alert alert-info">

            <p class="bg-info">{{session('updated_tournament')}}</p>
        </div>

    @endif



    <h2>Tournaments</h2>


    <table class="table table-sm table-hover  table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Logo</th>
            <th>Name</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>

        @if($tournaments->count() > 0)


            @foreach($tournaments as $tournament)


                <tr>
                    <td>{{$tournament->id}}</td>
                    <td> <img height="50" src="{{$tournament->photo ? $tournament->photo->file : 'http://placehold.it/400x400'}}" alt="" ></td>
                    <td><a href="{{route('tournaments.edit', $tournament->id)}}">{{$tournament->name}}</a></td>
                    {{--<td>{{$Tournament->type}}</td>--}}


                    <td>{{$tournament->created_at->diffForHumans()}}</td>
                    <td>{{$tournament->updated_at->diffForHumans()}}</td>

                    <td>
                        <a href="{{route('tournaments.edit',['id'=> $tournament->id])}}" class=" col-sm-8 btn btn-info btn-circle"><i class="fa fa-pencil fa-fw"></i></a>
                    </td>


                    <td>
                        <a href="{{route('tournaments.delete',['id'=>$tournament->id])}}" class="col-sm-8 btn btn-danger btn-circle"><i class="fa fa-trash fa-fw"></i></a>
                    </td>



                </tr>

            @endforeach

        @else

            <th colspan="5" class="text-center">No any Tournaments</th>
        @endif



        </tbody>
    </table>


@stop