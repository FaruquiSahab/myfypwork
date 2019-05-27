@extends('layouts.admin')


@section('title')
    Batting Stats
@stop

@section('header')
    Batting Stats
@stop


@section('content')

    <button id="tbtn" class="btn btn-success">T20 Stats</button>
    <button id="obtn" class="btn btn-primary">ODI Stats</button>
    
    {{-- <u><h2>Stats Of Players</h2></u> --}}
    <div class="" id="odi">
        <fieldset>
            <legend>One Day Stats</legend>
            <table class="table table-sm table-hover table-striped col-sm-12" id="mytable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Matches</th>
                        <th>Innings</th>
                        <th>Notouts</th>
                        <th>Runs</th>
                        <th>HS</th>
                        <th>Avg</th>
                        <th>100s</th>
                        <th>50s</th>
                        <th>4s</th>
                        <th>6s</th>
                    </tr>
                </thead>
            </table>
        </fieldset>
    </div>

    <div class="" id="t20">
        <fieldset>
            <legend>T20 Stats</legend>
            <table class="table table-sm table-hover table-striped col-sm-12" id="mytable1">
                <thead>
                    <tr>
                        {{-- <th>Format</th> --}}
                        <th>Name</th>
                        <th>Matches</th>
                        <th>Innings</th>
                        <th>Notouts</th>
                        <th>Runs</th>
                        <th>HS</th>
                        <th>Avg</th>
                        <th>S/R</th>
                        <th>100s</th>
                        <th>50s</th>
                        <th>4s</th>
                        <th>6s</th>
                    </tr>
                </thead>
            </table>
        </fieldset>
    </div>

@stop

@section('scripts')

    <script type="text/javascript">
        
        
        
        $('#tbtn').on('click',function(){
            $('#t20').removeClass('hidden');
            $('#odi').addClass('hidden');
            // $('#t20').css('display','block');
            // $('#odi').css('display','none');
        });

        $('#obtn').on('click',function(){
            $('#odi').removeClass('hidden');
            $('#t20').addClass('hidden');
            // $('#t20').css('display','none');
            // $('#odi').css('display','block');
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
                    { "data": "innings"},
                    { "data": "notouts"},
                    { "data": "runs"},
                    { "data": "highscore"},
                    { "data": "average_bat"},
                    // { "data": "strikerate"},
                    { "data": "centuries"},
                    { "data": "halfcenturies"},
                    // { "data": "catches"},
                    // { "data": "stumping"},
                    { "data": "fours"},
                    { "data": "sixes"},
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
                    { "data": "innings"},
                    { "data": "notouts"},
                    { "data": "runs"},
                    { "data": "highscore"},
                    { "data": "average_bat"},
                    { "data": "strikerate"},
                    { "data": "centuries"},
                    { "data": "halfcenturies"},
                    // { "data": "catches"},
                    // { "data": "stumping"},
                    { "data": "fours"},
                    { "data": "sixes"},
                ]
        });

        // $('#t20').css('display','none');
        // $('#odi').css('display','none');
    </script>
@stop