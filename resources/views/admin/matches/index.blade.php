@extends('layouts.admin')





@section('content')





    @if(Session::has('deleted_match'))
        <div class="alert alert-danger">

        <p class="bg-danger">{{session('deleted_match')}}</p>
    </div>

    @endif


    @if(Session::has('created_match'))
        <div class="alert alert-success">

            <p class="bg-success">{{session('created_match')}}</p>
        </div>

    @endif



    @if(Session::has('updated_match'))
        <div class="alert alert-info">

            <p class="bg-info">{{session('updated_match')}}</p>
        </div>

    @endif



    <h2>Matches</h2>


    <table class="table table-sm table-hover  table-striped">
        <thead>
        <tr>

            <th>Match Type</th>
            <th>Date</th>
            <th>Club </th>
            <th>Vs</th>
            <th>Club</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>

     {{--   @if($matches->count() > 0)


            @foreach($matches as $match)


                <tr>
                    <td>{{$match->id}}</td>
                    <td> <img height="50" src="{{$match->photo ? $match->photo->file : 'http://placehold.it/400x400'}}" alt="" ></td>
                    <td><a href="{{route('matches.edit', $match->id)}}">{{$match->name}}</a></td>
                    <td>{{$match->age}}</td>
                    <td>{{$match->date_of_birth}}</td>
                    <td>{{$match->club->name}}</td>
                    <td>{{$match->role->name}}</td>
                    <td>{{$match->batting_style ? $match->batting_style->name : '-'}}</td>
                    <td>{{$match->bowling_style ? $match->bowling_style->name : '-'}}</td>



                    <td>{{$match->created_at->diffForHumans()}}</td>
                    <td>{{$match->updated_at->diffForHumans()}}</td>

                    <td>
                        <a href="{{route('matches.edit',['id'=> $match->id])}}" class=" col-sm-8 btn btn-info btn-circle"><i class="fa fa-wrench fa-fw"></i></a>
                    </td>


                    <td>
                        <a href="{{route('matches.delete',['id'=>$match->id])}}" class="col-sm-8 btn btn-danger btn-circle"><i class="fa fa-trash fa-fw"></i></a>
                    </td>



                </tr>

            @endforeach

        @else

            <th colspan="5" class="text-center">No any matches</th>
        @endif

--}}

        </tbody>
    </table>


@stop