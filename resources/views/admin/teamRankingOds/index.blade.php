@extends('layouts.admin')





@section('content')



    @if(Session::has('deleted_teamRankingOD'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <p class="bg-danger">{{session('deleted_teamRankingOD')}}</p>
    </div>

    @endif


    @if(Session::has('created_teamRankingOD'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <p class="bg-success">{{session('created_teamRankingOD')}}</p>
        </div>

    @endif



    @if(Session::has('updated_teamRankingOD'))
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <p class="bg-info">{{session('updated_teamRankingOD')}}</p>
        </div>

    @endif


    <h2>Team Rankings</h2>


    <table class="table table-sm table-hover  table-striped">
        <thead class="">
        <tr>
            <th>ID</th>
            <th>Logo</th>
            <th>Club</th>
            <th>Points</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Edit</th>
            <th>Trash</th>

        </tr>
        </thead>
        <tbody>

        @if($teamRankingODs->count() > 0)


            @foreach($teamRankingODs as $teamRankingOD)


                <tr>
                    <td>{{$teamRankingOD->id}}</td>
                    {{--<td> <img height="50" src="{{$teamRankingOD->club->photo ? $teamRankingODclub->photo->file : 'http://placehold.it/400x400'}}" alt="" ></td>--}}
                    <td><a href="{{route('teamRankingOds.edit', $teamRankingOD->id)}}">{{$teamRankingOD->team->club->name}}</a></td>
                    <td>{{$teamRankingOD->points}}</td>

                    <td>{{$teamRankingOD->created_at->diffForHumans()}}</td>
                    <td>{{$teamRankingOD->updated_at->diffForHumans()}}</td>

                    <td>
                        <a href="{{route('teamRankingOds.edit',['id'=> $teamRankingOD->id])}}" class=" col-sm-8 btn btn-info btn-circle"><i class="fa fa-wrench fa-fw"></i></a>
                    </td>

                    <td>
                        <a href="{{route('teamRankingOds.delete',['id'=>$teamRankingOD->id])}}" class="col-sm-8 btn btn-danger btn-circle"><i class="fa fa-trash fa-fw"></i></a>
                    </td>



                </tr>

            @endforeach

        @else

            <th colspan="5" class="text-center">No any Ranking for ODs</th>
        @endif



        </tbody>
    </table>


@stop