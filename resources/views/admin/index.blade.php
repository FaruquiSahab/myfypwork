@extends('layouts.admin')

@section('title')
	Dashboard
@stop

@section('header')
	Admin Dashboard
@stop


@section('content')






    <div class="col-lg-3">

        <div class="panel panel-success">

            <div class="panel-heading text-center">
                Batsmen
            </div>
            <div class="panel-body text-center">
                <img src="{{asset('app/batsman.gif')}}" alt="batsman" class="gear" style="width: 50%; height: 40%" >

                <br>
                <br>
               <strong><h1>{{$batsman_count}}</h1></strong>

            </div>
        </div>
    </div>



    <div class="col-lg-3">

        <div class="panel panel-info">

            <div class="panel-heading text-center">
                Bowler
            </div>
            <div class="panel-body text-center">
                <img src="{{asset('app/bowler.png')}}" alt="bowler" class="gear" style="width: 30%; height: 40%" >

                <br>
                <br>
                <strong><h1>{{$bowler_count}}</h1></strong>

            </div>
        </div>

    </div>




    <div class="col-lg-3">

        <div class="panel panel-danger">

            <div class="panel-heading text-center">
                Wicket Keeper
            </div>
            <div class="panel-body text-center">
                <img src="{{asset('app/wk.png')}}" alt="wicket-keeper" class="gear" style="width: 55%; height: 40%" >

                <br>
                <br>
                <strong><h1>{{$wk_count}}</h1></strong>

            </div>
        </div>

    </div>





    <div class="col-lg-3">

        <div class="panel panel-default">

            <div class="panel-heading text-center">
                All Rounder
            </div>
            <div class="panel-body text-center">
                <img src="{{asset('app/all.jpg')}}" alt="all-rounder" class="gear" style="width: 90%; height: 40%" >

                <br>
                <br>
                <strong><h1>{{$allrounder_count}}</h1></strong>

            </div>
        </div>

    </div>








    <div class="col-lg-12 center">

        <br>

        <div class="panel panel-warning">

            <div class="panel-heading text-center">
               Upcoming Fixtures
            </div>
            <div class="panel-body text-center">



                <div class="container testimonial-group">
                    <div class="row text-center">
                    	@foreach($fixtures as $fixture)
                    		<div class="col-xs-6">
                    			<div style="font-size: smaller;">
                    				{{ substr($fixture->club1->name,0,strrpos($fixture->club1->name,' ')) }} vs {{substr($fixture->club2->name,0,strrpos($fixture->club2->name,' ')) }}
                    			</div>
                    		</div>
                    	@endforeach
                    	{{-- substr($str, 0, strrpos($str, ' ')) --}}
                    </div>
                </div>

                <br>
                </div>
        </div>

    </div>




    <style>
        /* The heart of the matter */
        .testimonial-group > .row {
            overflow-x: auto;
            white-space: nowrap;


        }
        .testimonial-group > .row > .col-xs-6 {
            display: inline-block;
            float: none;

        }

        /* Decorations */
        .col-xs-6 { color: black; font-size: 48px; padding-bottom: 5%; padding-top: 5%; }
        .col-xs-6:nth-child(3n+1) { background: lightyellow; }
        .col-xs-6:nth-child(3n+2) { background: #9c6; }
        .col-xs-6:nth-child(3n+3) { background: #69c; }

    </style>





@stop