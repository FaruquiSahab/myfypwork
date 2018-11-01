@extends('layouts.admin')





@section('content')



    @if(Session::has('deleted_playerRankingT20'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong class="bg-danger"><i class="fa fa-minus-circle fa-fw" style="font-size: 20px"></i>{{session('deleted_playerRankingT20')}}</strong>
    </div>

    @endif


    @if(Session::has('created_playerRankingT20'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong class="bg-success"><i class="fa fa-check-circle fa-fw" style="font-size: 20px"></i>{{session('created_playerRankingT20')}}</strong>
        </div>

    @endif



    @if(Session::has('updated_playerRankingT20'))
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <p class="bg-info"><i class="fa fa-info-circle fa-fw" style="font-size: 20px"></i>{{session('updated_playerRankingT20')}}</p>
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

        @if($playerRankingT20s->count() > 0)


            @foreach($playerRankingT20s as $playerRankingT20)


                <tr>
                    <td>{{$playerRankingT20->id}}</td>
                    <td> <img height="50" src="{{$playerRankingT20->player->photo ? $playerRankingT20->player->photo->file : 'http://placehold.it/400x400'}}" alt="" ></td>
                    <td><a href="{{route('playerRankingt20.edit', $playerRankingT20->player->id)}}">{{$playerRankingT20->player->name}}</a></td>
                    <td>{{$playerRankingT20->player->club->name}}</td>
                    <td>{{$playerRankingT20->player->role->name}}</td>
                    <td>{{$playerRankingT20->points}}</td>

                    <td>{{$playerRankingT20->created_at->diffForHumans()}}</td>
                    <td>{{$playerRankingT20->updated_at->diffForHumans()}}</td>

                    <td>
                        <a href="{{route('playerRankingt20.edit',['id'=> $playerRankingT20->id])}}" class=" col-sm-8 btn btn-info btn-circle"><i class="fa fa-wrench fa-fw"></i></a>
                    </td>

                    <td>
                        <a href="{{route('playerRankingt20.delete',['id'=>$playerRankingT20->id])}}" class="col-sm-8 btn btn-danger btn-circle"><i class="fa fa-trash fa-fw"></i></a>
                    </td>



                </tr>

            @endforeach

        @else

            <th colspan="5" class="text-center">No any Ranking for T20s</th>
        @endif



        </tbody>
    </table>


@stop