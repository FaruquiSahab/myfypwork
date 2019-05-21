@extends('layouts.admin')

@section('title')
    Runs's Graph
@stop

@section('header')
    Runs's Graph
@stop


@section('content')

    <a style="float: right; margin: 10px;" href="{{route('batsmen_stats.index')}}" class="btn btn-info">Back</a>


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

                <div class="panel-heading">Batsmen Runs</div>


                <div class="panel-body">


                    <div id="poll_div"></div>

                    <?= $area->render('ColumnChart', 'runs_max', 'poll_div') ?>


                </div>






@stop




