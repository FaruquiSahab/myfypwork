@extends('layouts.admin')


@section('title')
    Bowling Stats
@stop

@section('header')
    Bowling Stats
@stop


@section('content')

    <button id="tbtn" class="btn btn-success">T20 Stats</button>
    <button id="obtn" class="btn btn-primary">ODI Stats</button>
    
    {{-- <u><h2>Stats Of Players</h2></u> --}}

    <fieldset class="" id="odi">
        <legend>One Day Stats</legend>
        <table class="table table-sm table-hover table-striped col-sm-12" id="mytable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Matches</th>
                    <th>Innings Ball</th>
                    <th>Overs</th>
                    <th>Runs</th>
                    <th>Wickets</th>
                    <th>Avg</th>
                    <th>B/F</th>
                    <th>Eco</th>
                    <th>5Ws</th>
                </tr>
            </thead>
        </table>
    </fieldset>

    <fieldset class="" id="t20">
        <legend>T20 Stats</legend>
        <table class="table table-sm table-hover table-striped col-sm-12" id="mytable1">
            <thead>
                <tr>
                    {{-- <th>Format</th> --}}
                    <th>Name</th>
                    <th>Matches</th>
                    <th>Innings Ball</th>
                    <th>Overs</th>
                    <th>Runs</th>
                    <th>Wickets</th>
                    <th>Avg</th>
                    <th>B/F</th>
                    <th>Eco</th>
                    <th>5Ws</th>
                </tr>
            </thead>
        </table>
    </fieldset>
    
  

@stop

@section('scripts')

    <script type="text/javascript">

        $('#tbtn').on('click',function(){
            $('#t20').removeClass('hidden');
            $('#odi').addClass('hidden');
        });

        $('#obtn').on('click',function(){
            $('#odi').removeClass('hidden');
            $('#t20').addClass('hidden');
        });

        //load  table ajax
        $('#mytable').DataTable(
        {
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('statsdata2') }}",
                "columns":[
                    // { "data": "format" },
                    { "data": "names" },
                    { "data": "matches" },
                    { "data": "innings_bowl"},
                    { "data": "overs"},
                    { "data": "runs_ball"},
                    { "data": "wickets"},
                    { "data": "average_ball"},
                    { "data": "best_ball"},
                    { "data": "economy"},
                    { "data": "five_wickets"},
                ]
        });

        //load  table ajax
        $('#mytable1').DataTable(
        {
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('statsdata1') }}",
                "columns":[
                    // { "data": "format" },
                    { "data": "names" },
                    { "data": "matches" },
                    { "data": "innings_bowl"},
                    { "data": "overs"},
                    { "data": "runs_ball"},
                    { "data": "wickets"},
                    { "data": "average_ball"},
                    { "data": "best_ball"},
                    { "data": "economy"},
                    { "data": "five_wickets"},
                ]
        });
    </script>
@stop