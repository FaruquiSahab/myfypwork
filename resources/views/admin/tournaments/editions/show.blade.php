@extends('layouts.admin')




@section('content')

    {{--<link rel="stylesheet" href="{{ URL::asset('css/jquery.bracket.min.css') }}" />
    <script type="text/javascript" src="{{ URL::asset('js/jquery.bracket.min.js') }}"></script>--}}
    {{--// <script type="text/javascript" src="jquery-1.6.2.min.js"></script>--}}



    <h2>Edit Tournament Edition</h2>


    <div class="row">


        <div class="col-sm-8">

            <div class="panel-body">

                {!! Form::open(['method'=>'POST', 'action'=> 'TournamentClubController@store','files'=>true]) !!}

                {{--

                                @for($i=0; $i< sizeof($clubs); $i++)

                                <div class="form-group">
                                    {!! Form::label('club_id', 'Clubs') !!}
                                    {!! Form::checkbox('chcek', null, false) !!}
                                    {!! Form::text('club_id', $clubs[$i]->name, ['class'=>'form-control', 'name'=>'club_id','id'=>'clubSelect', 'required' ])!!}
                                    {!! Form::hidden('club_id', $clubs[$i]->name, ['class'=>'form-control', 'name'=>'club_id','id'=>'clubSelect', 'required' ])!!}
                                </div>

                                @endfor
                --}}
                <div class="container">



                    <div class="form-group">


                        <input id="totalClubs" type="hidden" value="{{$data->number_of_teams}}">
                        <input id="tournaments" type="hidden" value="{{$data->id}}" name="refer_id">
                        <input id="refer" type="hidden" value="{{$data->tournament_id}}" name="tournament_id">

{{--
                        <input id="clubs" type="hidden" value="{{$clubs->club_id}}">
--}}



                                                <label for="clubs">Select Clubs</label>
                                                <select id="club_id" name=" club_id[]"  class="form-control">
                                                    @foreach($clubs as $key => $club)
                                                        <option value="{{ $key }}" >{{ $club }}</option>
                                                    @endforeach
                                                </select>

                                                {{--{!! Form::label('club_id', 'Club') !!}
                                                {!! Form::select('club_id', [''=>'Choose Club'] + $clubs, null,['multiple'=>'true], ['class'=>'form-control'])!!}
                        --}}

                    </div>

                </div>




                <div class="form-group">
                    {!! Form::submit('Add Tournament', ['class'=>'btn btn-primary col-sm-3']) !!}
                </div>




                    {{--<div class="tournament">--}}



                    {{--</div>--}}

                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>





    <script type="text/javascript">
        var totalAllowedClubs = $('#totalClubs').val();
        $("#club_id").select2({
            placeholder: "Select Clubs",
            multiple: true,
            allowClear: true,
            maximumSelectionLength : totalAllowedClubs,
        });
    </script>

    {{--<script type="text/javascript">
        var abc = $('#clubs').val();
        console.log(abc);
        var minData = {
            teams:
                [

                    ["A","B"],
                    ["C","D"],
                    ["E","F"],
                    ["G","H"]


                ],
            results:
                [
                    [ [1,0],[1,2],[2,4],[2,1] ],
                    [ [1,0],[1,2] ],
                    [ [1,0],[1,2] ]
                ]
        }

        // $('.tournament').append('<p>Hello</p>');

        $('.tournament').bracket({
            init:minData
        });


    </script>--}}








    @include('includes.form_error')

@stop