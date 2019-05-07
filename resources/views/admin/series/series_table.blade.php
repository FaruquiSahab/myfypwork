@extends('layouts.admin')




@section('content')



    <h2>{{$fixtures[0]->name}}   </h2>
    <h3>{{$fixtures[0]->series_type->type_name}} Format</h3>
    <h5>{{$fixtures[0]->series_days}} Matches</h5>
    <br>



            <h3 align="left">Schedule</h3>
            <br>

            <table class="table table-bordered" align="center">
                <thead class="thead-dark">
                <tr>

                    <th scope="col">Club </th>
                    <th scope="col">Against</th>
                    <th scope="col">Club </th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Venue</th>
                    <th scope="col">Line Up</th>
                    <th scope="col">Result</th>
                </tr>
                </thead>
                <tbody>

                @foreach($fixtures as $fix)
                    <tr>
                        <td><b>{{$fix->club1->name}}</b></td>
                        <td>vs</td>
                        <td><b>{{$fix->club2->name}}</b></td>
                        <td>{{$fix->starting_date}}</td>
                        <td>{{$fix->time}}</td>
                        <td>{{$fix->ground->name}}</td>
                        <td>
                            @if(\Carbon\Carbon::parse($fix->starting_date)->lte(\Carbon\Carbon::today()))
                                @if($fix->status == '0')
                                    <form action="{{route('series.lineup',$fix->id)}}">
                                        <input type="hidden">
                                        <input type="submit" class="btn-s btn-success" value="Make Lineup">
                                    </form>
                                @endif
                            @else
                                <label class="label label-warning">No Actions Yet</label>
                            @endif
                        </td>
                        <td>{{ $fix->result ? $fix->result : "Yet To Play" }}</td>

                        {{--<td>{{$round->rounds}}</td>--}}
                        {{--<td>{{$item->c_name}}</td>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>



    </div>



    @include('includes.form_error')

@stop