@extends('layouts.admin')





@section('content')



    @if(Session::has('deleted_teamRankingT20'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <p class="bg-danger">{{session('deleted_teamRankingT20')}}</p>
    </div>

    @endif


    @if(Session::has('created_teamRankingT20'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <p class="bg-success">{{session('created_teamRankingT20')}}</p>
        </div>

    @endif



    @if(Session::has('updated_teamRankingT20'))
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <p class="bg-info">{{session('updated_teamRankingT20')}}</p>
        </div>

    @endif


    <h2>team Rankings</h2>


    <table class="table table-sm table-hover  table-striped">
        <thead class="">
        <tr>
            <th>ID</th>
            <th>Club ID</th>
            <th>Points</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Edit</th>
            <th>Trash</th>

        </tr>
        </thead>
        <tbody>

        @if($teamRankingT20s->count() > 0)


            @foreach($teamRankingT20s as $teamRankingT20)


                <tr>
                    <td>{{$teamRankingT20->id}}</td>
                    <td><a href="{{route('teamRankingt20.edit', $teamRankingT20->id)}}">{{$teamRankingT20->club_id}}</a></td>
                    <td><a href="{{route('teamRankingt20.edit', $teamRankingT20->id)}}">{{$teamRankingT20->points}}</a></td>

                    <td>{{$teamRankingT20->created_at->diffForHumans()}}</td>
                    <td>{{$teamRankingT20->updated_at->diffForHumans()}}</td>

                    <td>
                        <a href="{{route('teamRankingt20.edit',['id'=> $teamRankingT20->id])}}" class=" col-sm-8 btn btn-info btn-circle"><i class="fa fa-wrench fa-fw"></i></a>
                    </td>

                    <td>
                        <a href="{{route('teamRankingt20.delete',['id'=>$teamRankingT20->id])}}" class="col-sm-8 btn btn-danger btn-circle"><i class="fa fa-trash fa-fw"></i></a>
                    </td>



                </tr>

            @endforeach

        @else

            <th colspan="5" class="text-center">No any Ranking for T20s</th>
        @endif



        </tbody>
    </table>


@stop