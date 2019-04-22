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
                    <th scope="col">VS</th>
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
                        <td>{{$fix->club1->name}}</td>
                        <td>VS</td>
                        <td>{{$fix->club2->name}}</td>
                        <td>{{$fix->starting_date}}</td>
                        <td>{{$fix->time}}</td>
                        <td>{{$fix->ground->name}}</td>
                        <td>

                            {{--@if($fix->starting_date =="2019-02-11")--}}
                                <form action="{{route('series.lineup',$fix->id)}}">
                                    <input type="hidden">
                                    <input type="submit" class="btn btn-success" value="Allowed">
                                </form>
                            {{--@else--}}
                                {{--<label for="Not Allowed" class="label label-info">Not Allowed</label>--}}
                            {{--@endif--}}

                        </td>
                        <td>-</td>

                        {{--<td>{{$round->rounds}}</td>--}}
                        {{--<td>{{$item->c_name}}</td>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>



    </div>



    @include('includes.form_error')

@stop