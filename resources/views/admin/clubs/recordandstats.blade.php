@extends('layouts.admin')


@section('title')
    Club Records and Stats
@stop

@section('header')
    {{ $club }} Records and Stats
@stop

    @section('content')
        @if($stats->count() > 0)
        	
            <div class="col-lg-12">
                <div class="col-lg-4">

                    <div class="panel panel-info">

                        <div class="panel-heading text-center">
                            Matches
                        </div>
                        <div class="panel-body text-center">
                            <br>
                            <br>
                            <strong style="font-size: 50px;">{{ $stats->matches }}</strong>
                        </div>
                    </div>
                </div>



                <div class="col-lg-4">

                <div class="panel panel-success">

                    <div class="panel-heading text-center">
                        Win
                    </div>
                    <div class="panel-body text-center">

                        <br>
                        <br>
                        <strong style="font-size: 50px;">{{ $stats->win }}</strong>

                    </div>
                </div>
                </div>



                <div class="col-lg-4">

                    <div class="panel panel-danger">

                        <div class="panel-heading text-center">
                            Loss
                        </div>
                        <div class="panel-body text-center">

                            <br>
                            <br>
                            <strong style="font-size: 50px;">{{ $stats->loss }}</strong>

                        </div>
                    </div>
                </div>
            </div>



            <div class="col-lg-12">
                <div class="col-lg-4">

                    <div class="panel panel-warning">

                        <div class="panel-heading text-center">
                            Ranking Points
                        </div>
                        <div class="panel-body text-center">

                            <br>
                            <br>
                            <strong style="font-size: 50px;">{{ $stats->points }}</strong>

                        </div>
                    </div>
                </div>


                <div class="col-lg-4">

                    <div class="panel panel-default">

                        <div class="panel-heading text-center">
                            Highest Score
                        </div>
                        <div class="panel-body text-center">

                            <br>
                            <br>
                            <strong style="font-size: 50px;">@if($hs){{ $hs->runs }} /{{ $hs->wickets }}@endif</strong>

                        </div>
                    </div>
                </div>



                <div class="col-lg-4">

                    <div class="panel panel-info">

                        <div class="panel-heading text-center">
                            Lowest Score
                        </div>
                        <div class="panel-body text-center">

                            <br>
                            <br>
                            <strong style="font-size: 50px;">@if($ls)  {{ $ls->runs }} /{{ $ls->wickets }}@endif</strong>

                        </div>
                    </div>
                </div>



                <br>
                <br>
                <br>
                <br>
            <div class="col-lg-12">


            <div class="col-md-12">
                <div class="col-md-12">
                    <h2>Last Five Matches</h2>
                    <h3>
                        <ul>
                            @foreach($matches as $match)
                                <li>
                                    @if($id == $match->winner_club_id)
                                    <span class="label-sm label-success">
                                        {{ $match->club1->name }} vs {{ $match->club2->name }}
                                        Result: {{ $match->result }}
                                    </span>
                                    @else
                                    <span class="label-sm label-danger">
                                        {{ $match->club1->name }} vs {{ $match->club2->name }}
                                        Result: {{ $match->result }}</span>
                                    @endif
                                </li>
                                <br>
                            @endforeach
                        </ul>
                    </h3>
                </div>
            </div>
        @endif


        
    @stop