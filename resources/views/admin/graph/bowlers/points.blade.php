@extends('layouts.admin')




@section('content')

    <a href="{{route('bowler_stats.index')}}" class="btn btn-info">Back</a>


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

                <div class="panel-heading">Bowlers Points</div>


                <div class="panel-body">


                    <div id="poll_div"></div>

                    <?= $bar->render('BarChart', 'point_max', 'poll_div') ?>


                </div>






@stop




