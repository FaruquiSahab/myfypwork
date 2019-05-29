@extends('layouts.admin')


@section('title')
    Fixtures and Points Table
@stop

@section('header')
    Fixtures and Points Table
@stop

@section('content')  
    
    @foreach($val as $values)
        @foreach($values as $item)

            @endforeach
        @endforeach

    <h3>{{$val[0]->t_name}} {{$data[0]->tournament_type->type_name}} {{$data[0]->edition}}</h3>
    {{-- <h4>{{$data[0]->tournament_format->format_name}}</h4> --}}


    <br>

    <h3>Tournament Table</h3>
    <div class="form-group" align="center">

        <table class="table table-bordered" align="center" id="table">
            <thead>
            <tr>
                <th scope="col">Clubs</th>
                <th scope="col">Total Matches</th>
                <th scope="col">Win Matches</th>
                <th scope="col">Loss Matches</th>
                <th scope="col">Tie Matches</th>
                <th scope="col">Points</th>
                <th scope="col">Run Rates</th>
            </tr>
            </thead>
            <tbody>



            @foreach($val as $values)
            {{--@foreach($values as $item)--}}

                <tr>
                    <td>{{$values->c_name}}</td>
                    <td>{{$values->total_matches}}</td>
                    <td>{{$values->win_matches}}</td>
                    <td>{{$values->loss_matches}}</td>
                    <td>{{$values->tie_matches}}</td>
                    <td>{{$values->points_matches}}</td>
                    <td>{{$values->rr_matches}}</td>
                </tr>

                {{--@endforeach--}}
                    @endforeach

            </tbody>
        </table>

            <p align="right">*win points=2</p>

            <br>



            @if($data[0]->tournament_format->format_name == 'Round Robin')


                <h3 align="left">Schedule</h3>
                <br>

                <table class="table table-bordered mytable" align="center">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Club </th>
                        <th scope="col">VS</th>
                        <th scope="col">Club </th>
                        <th scope="col">Date</th>
                        {{-- <th scope="col">Time</th> --}}
                        {{-- <th scope="col">Venue</th> --}}
                        <th scope="col">Line Up</th>
                        {{-- <th scope="col">Result</th> --}}
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($fixtures as $fix)
                            <tr>
                                <td>{{$fix->club1->name}}</td>
                                <td>VS</td>
                                <td>{{$fix->club2->name}}</td>
                                <td>{{$fix->match_date}}</td>
                                {{-- <td>{{$fix->match_time}}</td> --}}
                                {{-- <td>{{$fix->ground->name}}</td> --}}
                                <td>
                                    {{--  "2019-02-11"  --}}
                                    @if(\Carbon\Carbon::parse($fix->match_date)->lte(\Carbon\Carbon::today()))
                                        @if($fix->status == '0')
                                            <form action="{{route('editions.lineup',encrypt($fix->id))}}">
                                                <input type="hidden">
                                                <input type="submit" class="btn-xs btn-success" value="Make Lineup">
                                            </form>
                                        @elseif($fix->status == '1')
                                            <form action="{{ route('check.match',$fix->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                <input type="submit" class="btn-xs btn-warning" value="Score Match">
                                            </form>
                                        @endif
                                    @else
                                        <label class="label label-info">No Actions Yet</label>
                                    @endif

                                </td>
                                {{-- <td>-</td> --}}

                                {{--<td>{{$round->rounds}}</td>--}}
                                {{--<td>{{$item->c_name}}</td>--}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            @endif

    </div>

    @if($data[0]->tournament_format->format_name == 'Knockout')


    
    @endif


    @include('includes.form_error')

@stop

@section('scripts')
    <script type="text/javascript">
        $('#table').DataTable({
            "paging": false,
            "searching": false,
            "info":false,
            "order": [[ 5, "desc" ],[ 6, "desc" ]],
            "columnDefs": [
                { "orderable": false, "targets": '_all' }
            ]
        });

        $('.mytable').DataTable({
            "order": [[ 3, "asc" ]],
            "columnDefs": [
                { "orderable": false, "targets": '_all' }
            ]
        });

    </script>
@stop