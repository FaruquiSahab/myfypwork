@extends('layouts.admin')


@section('title')
    Bowlers Economy Based Performance
@stop

@section('header')
    Bowlers Economy Based Performance
@stop

@section('content')

    @if($format == 1)
    <a style="float: right; margin: 10px;" href="{{route('bowler_stats.index')}}" class="btn btn-info">Back</a>
    @else
    <a style="float: right; margin: 10px;" href="{{route('bowler_stats.index2')}}" class="btn btn-info">Back</a>
    @endif


    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>



    <div class="container" style="">

        <div class="row">
            <div class="panel panel-default">

                <div class="panel-heading">Bowlers Economy</div>


                <div class="panel-body">


                    <div id="poll_div"></div>

                    <?= $line->render('LineChart', 'eco_max', 'poll_div') ?>


                </div>






@stop




