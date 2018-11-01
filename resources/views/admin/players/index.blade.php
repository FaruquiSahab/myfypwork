@extends('layouts.admin')





@section('content')





    @if(Session::has('deleted_player'))
        <div class="alert alert-danger">

        <p class="bg-danger">{{session('deleted_player')}}</p>
    </div>

    @endif


    @if(Session::has('created_player'))
        <div class="alert alert-success">

            <p class="bg-success">{{session('created_player')}}</p>
        </div>

    @endif



    @if(Session::has('updated_player'))
        <div class="alert alert-info">

            <p class="bg-info">{{session('updated_player')}}</p>
        </div>

    @endif



    <h2>Players</h2>


    <table class="table table-sm table-hover  table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Age</th>
            <th>Date of Birth</th>
            <th>Club</th>
            <th>Role</th>
            <th>Batting Style</th>
            <th>Bowling Style</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>

        @if($players->count() > 0)


            @foreach($players as $player)


                <tr>
                    <td>{{$player->id}}</td>
                    <td> <img height="50" src="{{$player->photo ? $player->photo->file : 'http://placehold.it/400x400'}}" alt="" ></td>
                    <td><a href="{{route('players.edit', $player->id)}}">{{$player->name}}</a></td>
                    <td>{{$player->age}}</td>
                    <td>{{$player->date_of_birth}}</td>
                    <td>{{$player->club->name}}</td>
                    <td>{{$player->role->name}}</td>
                    <td>{{$player->batting_style ? $player->batting_style->name : '-'}}</td>
                    <td>{{$player->bowling_style ? $player->bowling_style->name : '-'}}</td>



                    <td>{{$player->created_at->diffForHumans()}}</td>
                    <td>{{$player->updated_at->diffForHumans()}}</td>

                    <td>
                        <a href="{{route('players.edit',['id'=> $player->id])}}" class=" col-sm-8 btn btn-info btn-circle"><i class="fa fa-wrench fa-fw"></i></a>
                    </td>


                    <td>
                        <a href="{{route('players.delete',['id'=>$player->id])}}" class="col-sm-8 btn btn-danger btn-circle"><i class="fa fa-trash fa-fw"></i></a>
                    </td>



                </tr>

            @endforeach

        @else

            <th colspan="5" class="text-center">No any players</th>
        @endif



        </tbody>
    </table>


@stop