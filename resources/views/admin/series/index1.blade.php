@extends('layouts.admin')



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

    <a href=""  data-target="#addmodel" data-toggle="modal" class="btn btn-info" >New Series</a>

    <h2>Series</h2>


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
                       {{$serie->name}}
                    </td>
                    {{--<td>{{$Tournament->type}}</td>--}}

                    {{--<td>--}}
                        {{--{{ $tournament->edition }}--}}
                    {{--</td>--}}

                    {{--<td>{{ $tournament->number_of_teams }}</td>--}}


                    <td>

                            <a style="margin: 5px" href="{{{route('series.series_table', $serie->id)}}}}" class=" col-sm-8 btn btn-info btn-circle"><i class="fa fa-eye fa-fw"></i></a>

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
                    <h3 class="modal-title"><strong>Series</strong></h3>
                </div>
                <div class="modal-body">

                    {!! Form::open(['method'=>'POST', 'action'=> 'SeriesController@store','files'=>true]) !!}



                    {{--<div class="form-group">--}}
                        {{--{!! Form::label('photo_id', 'Logo') !!}--}}
                        {{--{!! Form::file('photo_id', null, ['class'=>'form-control'])!!}--}}
                    {{--</div>--}}



                    {{--<div class="form-group">--}}
                        {{--{!! Form::label('starting_date', 'Starting Date') !!}--}}
                        {{--{!! Form::text('starting_date', null, ['class'=>'form-control','required', 'id' => 'start_date'])!!}--}}
                        {{--<input name="starting_date" class="form-control" type="text" id="datepicker" required>--}}
                    {{--</div>--}}


                    {{--<div class="form-group">--}}
                        {{--{!! Form::label('ending_date', 'Ending Date') !!}--}}
                        {{--{!! Form::date('ending_date', null, ['class'=>'form-control','required','id' => 'end_date'])!!}--}}
                    {{--</div>--}}
              {{----}}

                    {{--<div class="form-group">--}}
                        {{--{!! Form::label('tournament_id', 'Tournament') !!}--}}
                        {{--{!! Form::select('tournament_id', $tournamentss, null, ['placeholder'=>'Select a Tournament', 'class'=>'form-control', 'name'=>'tournament_id','id'=>'tournamentSelect', 'required'])!!}--}}


                        {{--<label for="tournament">Tournament</label>--}}
                        {{--<select name="tournament_id" form="carform" class="form-control">--}}
                        {{--<option value="" default selected>Tournament</option>--}}
                        {{--  @foreach($tournamentss as $key=> $tour)--}}
                        {{--<option value="{{$tournamentss[$key]->id}}">{{$tournamentss[$key]->name}}</option>--}}
                        {{--@endforeach--}}
                        {{--</select>--}}



                    {{--</div>--}}

                    {{--<div class="form-group">--}}
                        {{--{!! Form::label('tournament_type_id', 'Tournament Type') !!}--}}
                        {{--{!! Form::select('tournament_type_id', $m_type, null, ['placeholder'=>'Match Type', 'class'=>'form-control', 'name'=>'tournament_type_id','id'=>'TypeSelect', 'required'])!!}--}}
                    {{--</div>--}}

                    {{--<div class="form-group">--}}
                        {{--{!! Form::label('tournament_format_id', 'Tournament') !!}--}}
                        {{--{!! Form::select('tournament_id', $t_format, null, ['placeholder'=>'Tournament Format', 'class'=>'form-control', 'name'=>'tournament_format_id','id'=>'formatSelect', 'required'])!!}--}}
                    {{--</div>--}}




                    {{--<div class="form-group">--}}
                        {{--{!! Form::label('ground_id', 'Ground') !!}--}}
                        {{--{!! Form::select('ground_id', $t_grounds, null, ['placeholder'=>'Ground', 'class'=>'form-control', 'name'=>'ground_id', 'required'])!!}--}}
                    {{--</div>--}}




                    {{--<div class="form-group">--}}

                        {{--{!! Form::label('number_of_teams', 'Number of Teams') !!}--}}
                        {{--{!! Form::number('number_of_teams', null, ['class'=>'form-control', 'min'=>'4','max'=>'10', 'required'])!!}--}}

                    {{--</div>--}}


                    {{--<div class="form-group">--}}
                        {{--{!! Form::submit('Add Tournament', ['class'=>'btn btn-primary col-sm-3']) !!}--}}
                    {{--</div>--}}

                    {{--<div class="form-group">--}}
                        {{--{!! Form::button('Cancel', ['class'=>'btn btn-danger col-sm-3', 'data-dismiss'=>'modal']) !!}--}}
                    {{--</div>--}}

                    <input type="hidden" name="button_action" value="0">
                    <div class="form-group">
                        {!! Form::label('', 'Name') !!}
                        {!! Form::text('name', null, ['class'=>'form-control', 'id'=>'clubname'])!!}
                    </div>




                    <div class="form-group">

                        <label for="date">Date</label>
                        <input name="starting_date" class="form-control" type="text" id="date_picker4" required>


                    </div>



                    <div class="form-group">
                        {!! Form::label('club_id_1', 'Club') !!}
                        {!! Form::select('club_id_1', $clubs, null, ['placeholder'=>'Select Club','class'=>'form-control', 'id'=>'clublevel'])!!}
                    </div>



                    <div class="form-group">
                        {!! Form::label('club_id_2', 'Club') !!}
                        {!! Form::select('club_id_2', $clubs, null, ['placeholder'=>'Select Club','class'=>'form-control', 'id'=>'clublevel'])!!}
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
                        {!! Form::select('ground_id', $grounds, null, ['placeholder'=>'Select Ground','class'=>'form-control', 'id'=>'clublevel'])!!}
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

        //         Get today's date
        var today = new Date();
        console.log(today);

        $("#datepicker").datepicker({
            minDate: today, // set the minDate to the today's date
            maxDate: '+1y'
            // you can add other options heres
        });

        /* $('#start_date').on('change select',function () {
            $('#end_date').prop('disabled',false);
         });


         $('#end_date').on('change select',function () {
            var endDate =  $('#end_date').val();
             var startDate =  $('#start_date').val();
 //            console.log(endDate);

             $.ajax({
                 url: "tournaments_edtions",
                 method: "GET",
                 data: {
                     'end_date':endDate,
                     'start_date':startDate,
                     '_token': $('input[name=_token]').val()
                 },
                 success: function () {

                 },
                 error: function () {

                 }
             })
         });*/
    </script>




@stop