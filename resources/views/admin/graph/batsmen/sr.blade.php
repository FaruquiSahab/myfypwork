@extends('layouts.admin')


@section('title')
    Strike Rate Based Performance
@stop

@section('header')
    Strike Rate Based Performance
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

                <div class="panel-heading">Batsmen Strike Rate</div>


                <div class="panel-body">


                    <div id="poll_div"></div>

                    <?= $line->render('LineChart', 'sr_max', 'poll_div') ?>


                </div>






@stop




