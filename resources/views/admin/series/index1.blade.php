@extends('layouts.admin')

@section('title')
    Series
@stop

@section('header')
    Series
@stop


@section('content')



    @if(Session::has('deleted_tournament'))
        <div class="alert alert-danger">

            <p class="bg-danger">{{session('deleted_tournament')}}</p>
        </div>

    @endif


    @if(Session::has('created_series'))
        <div class="alert alert-success">

            <p class="bg-success">{{session('created_series')}}</p>
        </div>

    @endif



    @if(Session::has('updated_tournament'))
        <div class="alert alert-info">

            <p class="bg-info">{{session('updated_tournament')}}</p>
        </div>

    @endif

    <a href="" style="float: right;"  data-target="#addmodel" data-toggle="modal" class="btn btn-info" >New Series</a>

    {{-- <h2>Series</h2> --}}


    <table class="table table-sm table-hover  table-striped">
        <thead>
        <tr>


            {{--<th>Logo</th>--}}
            <th>Name</th>
            {{--<th>Edition</th>--}}
            {{--<th>No of Teams</th>--}}
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        @if($series->count() > 0)


            @foreach($series as $key => $serie)


                <tr>
                    {{--<td> <img height="50" src="{{$tournament->photo ? $tournament->photo->file : 'http://placehold.it/400x400'}}" alt="" ></td>--}}
                    <td>
                        <a href="{{ route('seriesStats',$serie->id) }}">
                            {{$serie->name}}
                            <i class="fa fa-bar-chart" aria-hidden="true"></i>
                        </a>
                    </td>
                    {{--<td>{{$Tournament->type}}</td>--}}

                    {{--<td>--}}
                        {{--{{ $tournament->edition }}--}}
                    {{--</td>--}}

                    {{--<td>{{ $tournament->number_of_teams }}</td>--}}


                    <td>

                            <a style="margin: 5px" href="{{{route('series.series_table', $serie->id)}}}}" class=" col-sm-8 btn btn-info btn-circle"><i class="fa fa-eye fa-fw"></i></a>
                        {{-- {{ route('series.destroy',$serie->id) }} --}}
                        <a style="margin: 5px" href="" class="col-sm-8 btn btn-danger btn-circle"><i class="fa fa-trash fa-fw"></i></a>
                    </td>



                </tr>

            @endforeach

        @else
            <th colspan="5" class="text-center">No Series Yet</th>
        @endif


        </tbody>
    </table>



    {{-- Add Modal Starts --}}
    <div class="modal" tabindex="-1" role="dialog" id="addmodel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">
                        <strong>New Series Requirement</strong>
                    </h3>
                </div>
                <div class="modal-body">

                    {!! Form::open(['method'=>'POST', 'action'=> 'SeriesController@store','files'=>true]) !!}


                    <input type="hidden" name="button_action" value="0">
                    <div class="form-group">
                        {!! Form::label('', 'Name') !!}
                        {!! Form::text('name', null, ['class'=>'form-control', 'id'=>'clubname'])!!}
                    </div>




                    <div class="form-group">

                        <label for="date">Date</label>
                        <input type="text" name="starting_date" class="form-control" id="datepicker" required autocomplete="off">


                    </div>



                    <div class="form-group">
                        {!! Form::label('club_id_1', 'First Club') !!}
                        {{-- {!! Form::select('club_id_1', $clubs, null, ['placeholder'=>'Select Club','class'=>'form-control', 'id'=>'club1'])!!} --}}
                        <select class="form-control" name="club_id_1" id="club1">
                            
                        </select>
                    </div>



                    <div class="form-group">
                        {!! Form::label('club_id_2', 'Second Club') !!}
                        {{-- {!! Form::select('club_id_2', $clubs, null, ['placeholder'=>'Select Club','class'=>'form-control', 'id'=>'clublevel'])!!} --}}
                        <select class="form-control" name="club_id_2" id="club2">
                            
                        </select>
                    </div>


                    <div class="form-group">
                        {!! Form::label('series_type_id', 'Type') !!}
                        {!! Form::select('series_type_id', $series_type, null, ['placeholder'=>'Select Type','class'=>'form-control', 'id'=>'clublevel'])!!}
                    </div>



                    <div class="form-group">
                        {{--{!! Form::label('series_days', 'Days') !!}--}}
                        {{--{!! Form::select('series_days', null, ['placeholder'=>'Select Days','class'=>'form-control', 'id'=>'clublevel'])!!}--}}
                        <label for="">Series Matchess</label>
                        <select class="form-control" name="series_days">
                            <option value="">Select Matches</option>
                            <option value="3">Three Matches</option>
                            <option value="5">Five Matches</option>
                        </select>
                    </div>




                    <div class="form-group">
                        {!! Form::label('ground_id', 'Ground') !!}
                        {{-- {!! Form::select('ground_id', $grounds, null, ['placeholder'=>'Select Ground','class'=>'form-control', 'id'=>'clublevel'])!!} --}}
                        <select class="form-control" name="ground_id" id="ground"></select>
                    </div>


                    {{-- <div class="form-group">
                        {!! Form::label('', 'Logo') !!}
                        {!! Form::file('photo_id', null, ['class'=>'form-control','id'=>'photo_id'])!!}
                    </div> --}}


                    <div class="form-group">
                        {!! Form::submit('Create Series', ['class'=>'btn btn-primary col-sm-3 submit', 'id'=>'addSeries']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::button('Cancel', ['class'=>'btn btn-danger col-sm-3 mdcl', 'data-dismiss'=>'modal']) !!}
                    </div>


                    {!! Form::close() !!}

                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    {{-- End Add Modal --}}




@stop

@section('scripts')
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css" type="text/css" media="all">
    <script type="text/javascript">
        $('input').prop('required',true);
        $('select').prop('required',true);
        var today = new Date();
        console.log(today);
        $('#datepicker').datepicker({
            format: 'yyyy-mm-dd',
            minDate: today,
            maxDate: "+1Y"
        });

        $('#club1').on('change select', function(){
            $.ajax({
                data:{
                    '_token':$('input[name=_token]').val(),
                    'id': $('#club1').val(),
                    'date': $('#datepicker').val()
                },
                type: "POST",
                url: "{{ route('clubByClub') }}",
                success:function(data){
                    console.log('success');
                    console.log(data);
                    var clubs = JSON.parse(data,true);
                    console.log(clubs.length);
                    var html = '';
                    $('#club2').html(html);
                    html = '<option selected disabled value>Select Club</option>';
                    for(var i=0; i<clubs.length; i++)
                    {
                        html += '<option value="'+clubs[i]['id'] +'">'+clubs[i]['name'] +'</option>';
                    }
                    $('#club2').append(html);
                },
                error:function(data){
                    console.log('error');
                    console.log(data);
                }
            })
        });

        $('#datepicker').on('change select', function(){
            var _date = $('#datepicker').val();
            var _token = $('input[name=_token]').val();
            $.ajax({
                type:"POST",
                url: "{{ route('clubByDate') }}",
                data: {
                    '_token': _token,
                    'date': _date
                },
                success:function(data){
                    console.log('success');
                    console.log(data);
                    var clubs = JSON.parse(data,true);
                    console.log(clubs);
                    var html = '';
                    html = '<option selected disabled value>Select Club</option>';
                    $('#club1').html(html);
                    $('#club2').html(html);
                    html = '';
                    for(var i=0; i<clubs.length; i++)
                    {
                        html+= '<option value="'+clubs[i]['id']+'">'+clubs[i]['name']+'</option>';
                    }
                    $('#club1').append(html);
                },
                error:function(data){
                    console.log('error');
                    console.log(data)
                }
            }) 
        });

        $('#datepicker').on('change select', function(){
            var _date = $('#datepicker').val();
            var _token = $('input[name=_token]').val();
            $.ajax({
                type:"POST",
                url: "{{ route('groundByDate') }}",
                data: {
                    '_token': _token,
                    'date': _date,
                    'extra': '1'
                },
                success:function(data){
                    console.log('success');
                    console.log(data);
                    var ground = JSON.parse(data,true);
                    console.log(ground);
                    var html = '';
                    html = '<option selected disabled value>Select Ground</option>';
                    $('#ground').html(html);
                    html = '';
                    for(var i=0; i<ground.length; i++)
                    {
                        html+= '<option value="'+ground[i]['id']+'">'+ground[i]['name']+'</option>';
                    }
                    $('#ground').append(html);
                },
                error:function(data){
                    console.log('error');
                    console.log(data)
                }
            }) 
        });
    </script>




@stop