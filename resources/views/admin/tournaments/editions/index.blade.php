@extends('layouts.admin')





@section('content')



    @if(Session::has('deleted_tournament'))
        <div class="alert alert-danger">

            <p class="bg-danger">{{session('deleted_tournament')}}</p>
        </div>

    @endif


    @if(Session::has('created_edition'))
        <div class="alert alert-success">

            <p class="bg-success">{{session('created_edition')}}</p>
        </div>

    @endif



    @if(Session::has('updated_tournament'))
        <div class="alert alert-info">

            <p class="bg-info">{{session('updated_tournament')}}</p>
        </div>

    @endif



    <h2>Tournaments Edition</h2>


    <table class="table table-sm table-hover  table-striped">
        <thead>
        <tr>

            <th>ID</th>
            <th>Logo</th>
            <th>Name</th>
            <th>Edition</th>
            <th>No of Teams</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        @if($tournaments->count() > 0)


            @foreach($tournaments as $key => $tournament)


                <tr>
                    <td>{{$tournament->id}}</td>
                    <td> <img height="50" src="{{$tournament->photo ? $tournament->photo->file : 'http://placehold.it/400x400'}}" alt="" ></td>
                    <td><a href="{{route('edition.show', $tournament->id)}}">{{$tournament->tournament->name}}</a></td>
                    {{--<td>{{$Tournament->type}}</td>--}}

                    <td>
                        {{ $tournament->edition }}
                    </td>

                    <td>{{ $tournament->number_of_teams }}</td>


                    <td>
                    	<a href="{{route('tournaments.edit',['id'=> $tournament->id])}}" class=" col-sm-8 btn btn-info btn-circle"><i class="fa fa-pencil fa-fw"></i></a>
                        <a href="{{route('tournaments.delete',['id'=>$tournament->id])}}" class="col-sm-8 btn btn-danger btn-circle"><i class="fa fa-trash fa-fw"></i></a>
                    </td>



                </tr>

            @endforeach

        @else
            <th colspan="5" class="text-center">No Edition Yet</th>
        @endif


        </tbody>
    </table>


@stop