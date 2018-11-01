@extends('layouts.admin')





@section('content')



    @if(Session::has('deleted_playerRankingOD'))
        <div class="alert alert-danger">

            <p class="bg-danger">{{session('deleted_playerRankingOD')}}</p>
    </div>

    @endif


    @if(Session::has('created_playerRankingOD'))
        <div class="alert alert-success">

            <p class="bg-success">{{session('created_playerRankingOD')}}</p>
        </div>

    @endif



    @if(Session::has('updated_playerRankingOD'))
        <div class="alert alert-info">

            <p class="bg-info">{{session('updated_playerRankingOD')}}</p>
        </div>

    @endif


    <h2>Player Rankings</h2>


    <table class="table table-sm table-hover  table-striped">
        <thead class="">
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Club</th>
            <th>Role</th>
            <th>Points</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Edit</th>
            <th>Trash</th>

        </tr>
        </thead>
        <tbody>

        @if($playerRankingODs->count() > 0)


            @foreach($playerRankingODs as $playerRankingOD)


                <tr>
                    <td>{{$playerRankingOD->id}}</td>
                    <td> <img height="50" src="{{$playerRankingOD->player->photo ? $playerRankingOD->player->photo->file : 'http://placehold.it/400x400'}}" alt="" ></td>
                    <td><a href="{{route('playerRankingOds.edit', $playerRankingOD->player->id)}}">{{$playerRankingOD->player->name}}</a></td>
                    <td>{{$playerRankingOD->player->club->name}}</td>
                    <td>{{$playerRankingOD->player->role->name}}</td>
                    <td>{{$playerRankingOD->points}}</td>

                    <td>{{$playerRankingOD->created_at->diffForHumans()}}</td>
                    <td>{{$playerRankingOD->updated_at->diffForHumans()}}</td>

                    <td>
                        <a href="{{route('playerRankingOds.edit',['id'=> $playerRankingOD->id])}}" class=" col-sm-8 btn btn-info btn-circle"><i class="fa fa-wrench fa-fw"></i></a>
                    </td>

                    <td>
                        <a href="{{route('playerRankingOds.delete',['id'=>$playerRankingOD->id])}}" class="col-sm-8 btn btn-danger btn-circle"><i class="fa fa-trash fa-fw"></i></a>
                    </td>



                </tr>

            @endforeach

        @else

            <th colspan="5" class="text-center">No any Ranking for ODs</th>
        @endif



        </tbody>
    </table>


@stop