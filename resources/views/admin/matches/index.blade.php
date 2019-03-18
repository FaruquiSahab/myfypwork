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
            </tr>
        </thead>
        <tbody>
            @foreach($matches as $key=>$match)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$match->club1->name}}</td>
                    <td>vs</td>
                    <td>{{$match->club2->name}}</td>
                    <td>{{$match->match_date}}</td>
                    <td>{{$match->toss_name->name}}</td>
                    <td>{{$match->matchtype->type_name}}</td>
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