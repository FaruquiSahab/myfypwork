@extends('layouts.admin')




@section('content')

    <a href="{{route('batsmen_stats.index')}}" class="btn btn-info">Back</a>


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

                <div class="panel-heading">Batsmen Average</div>


                <div class="panel-body">


                    <div id="poll_div"></div>

                    <?= $pie->render('ColumnChart', 'avg_max', 'poll_div') ?>


                </div>






@stop




