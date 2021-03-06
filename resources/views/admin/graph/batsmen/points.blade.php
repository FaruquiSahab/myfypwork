@extends('layouts.admin')

@section('title')
    Graph On Points
@stop

@section('header')
    Graph On Points
@stop


@section('content')

    @if($format == 1)
    <a style="float: right; margin: 10px;" href="{{route('batsmen_stats.index')}}" class="btn btn-info">Back</a>
    @else
    <a style="float: right; margin: 10px;" href="{{route('batsmen_stats.index2')}}" class="btn btn-info">Back</a>
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

                <div class="panel-heading">Batsmen Points</div>


                <div class="panel-body">


                    <div id="poll_div"></div>

                    <?= $bar->render('BarChart', 'point_max', 'poll_div') ?>


                </div>






@stop




