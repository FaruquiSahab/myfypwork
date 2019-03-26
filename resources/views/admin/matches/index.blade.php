@extends('layouts.admin')





@section('content')


    <span id="form_output"></span>

    <h2>Matches</h2>

    <table class="table table-sm table-hover  table-striped" id="mytable">
        <thead>
            <tr>
                <th>Id</th>
                <th>Club</th>
                <th>vs</th>
                <th>Club</th>
                <th>Date</th>
                <th>Toss</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($matches as $key=>$match)
                <tr>
                    <td>{{$key+1}}</td>
                    <td style="font-weight:bold">{{$match->club1->name}}</td>
                    <td>vs</td>
                    <td style="font-weight:bold">{{$match->club2->name}}</td>
                    <td>{{$match->match_date}}</td>
                    <td>{{$match->toss_name->name}}</td>
                    <td>{{$match->matchtype->type_name}}</td>
                    <td>
                        @if($match->status == 0)
                            <form action="{{ route('scoring.match',$match->id) }}">
                                <button class="btn btn-warning">Score Match</button>
                            </form>
                        @elseif($match->status == 1)
                            <form action="">
                                <button class="btn btn-danger">View Scorecrad</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('scripts')
    <script type="text/javascript">
        {{--$('#mytable').DataTable(--}}
            {{--{--}}
                {{--"processing": true,--}}
                {{--"serverSide": true,--}}
                {{--"ajax": "{{ route('matchdata') }}",--}}
                {{--"columns":[--}}
                    {{--{ "data": "date" },--}}
                    {{--{ "data": "club_id_1" },--}}
                    {{--{ "data": "vs"},--}}
                    {{--{ "data": "club_id_2" }--}}
                {{--]--}}
            {{--});--}}
    </script>
@stop