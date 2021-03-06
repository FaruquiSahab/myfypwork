@extends('layouts.admin')


@section('title')
    Tournament Editions Section
@stop

@section('header')
    Tournament Editions Section
@stop


@section('content')



    @if(Session::has('deleted_tournament'))
        <div class="alert alert-danger">

            <p class="bg-danger">{{session('deleted_tournament')}}</p>
        </div>

    @endif


    @if(Session::has('created_edition'))
        <div class="alert alert-success">

            <p class="bg-success">{{session('created_edition')}}</p>
        </div>

    @endif



    @if(Session::has('updated_tournament'))
        <div class="alert alert-info">

            <p class="bg-info">{{session('updated_tournament')}}</p>
        </div>

    @endif

    <a href="" style="float: right;" data-target="#addmodel" data-toggle="modal" class="btn btn-info" >New Edition</a>

    {{-- <h2>Tournaments Edition</h2> --}}


    <table class="table table-sm table-hover  table-striped">
        <thead>
        <tr>


            <th>Logo</th>
            <th>Name</th>
            <th>Edition</th>
            <th>No of Teams</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        @if($tournaments->count() > 0)


            @foreach($tournaments as $key => $tournament)


                <tr>
                    <td> <img height="50" src="{{$tournament->photo ? $tournament->photo->file : 'http://placehold.it/400x400'}}" alt="" ></td>
                    <td>
                        @if($tournament->status == 0)
                        <a href="{{route('edition.show', $tournament->id)}}"> {{$tournament->tournament->name}}</a>
                        @else
                            <a href="{{ route('tournamentStats',$tournament->id) }}">
                                {{$tournament->tournament->name}}
                                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                            </a>
                        @endif
                    </td>
                    {{--<td>{{$Tournament->type}}</td>--}}

                    <td>
                        {{ $tournament->edition }}
                    </td>

                    <td>{{ $tournament->number_of_teams }}</td>


                    <td>
                        @if($tournament->status == 1)
                    	    <a style="margin: 5px" href="{{route('edition.tournament_table', encrypt($tournament->id))}}" class=" col-sm-8 btn btn-info btn-circle"><i class="fa fa-eye fa-fw"></i></a>
                        @endif
                        <a style="margin: 5px" href="{{route('edition.delete', encrypt($tournament->id))}}" class="col-sm-8 btn btn-danger btn-circle"><i class="fa fa-trash fa-fw"></i></a>
                    </td>



                </tr>

            @endforeach

        @else
            <th colspan="5" class="text-center">No Edition Yet</th>
        @endif


        </tbody>
    </table>



{{-- Add Modal Starts --}}
<div class="modal" tabindex="-1" role="dialog" id="addmodel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title"><strong>Tournament</strong></h3>
  </div>
  <div class="modal-body">
    
    {!! Form::open(['method'=>'POST', 'action'=> 'TournamentReferenceController@store','files'=>true]) !!}

                <div class="form-group">
                    {!! Form::label('photo_id', 'Logo') !!}
                    {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
                </div>


      <div class="form-group">
          {!! Form::label('starting_date', 'Starting Date') !!}
          {{--{!! Form::text('starting_date', null, ['class'=>'form-control','required', 'id' => 'start_date'])!!}--}}
          <input name="starting_date" class="form-control" type="text" id="datepicker" required autocomplete="off">
      </div>


      {{--<div class="form-group">
          {!! Form::label('ending_date', 'Ending Date') !!}
          {!! Form::date('ending_date', null, ['class'=>'form-control','required','id' => 'end_date'])!!}
        </div>
        --}}

                <div class="form-group">
                    {!! Form::label('tournament_id', 'Tournament') !!}
                    {!! Form::select('tournament_id', $tournamentss, null, ['placeholder'=>'Select a Tournament', 'class'=>'form-control', 'name'=>'tournament_id','id'=>'tournamentSelect', 'required'])!!}


                    {{--<label for="tournament">Tournament</label>--}}
                    {{--<select name="tournament_id" form="carform" class="form-control">--}}
                        {{--<option value="" default selected>Tournament</option>--}}
                      {{--  @foreach($tournamentss as $key=> $tour)--}}
                        {{--<option value="{{$tournamentss[$key]->id}}">{{$tournamentss[$key]->name}}</option>--}}
                        {{--@endforeach--}}
                    {{--</select>--}}



                </div>

                <div class="form-group">
                    {!! Form::label('tournament_type_id', 'Match Type') !!}
                    {!! Form::select('tournament_type_id', $m_type, null, ['placeholder'=>'Match Type', 'class'=>'form-control', 'name'=>'tournament_type_id','id'=>'TypeSelect', 'required'])!!}
                </div>
                {{-- Tournament Format --}}
                {{-- <div class="form-group">
                    {!! Form::label('tournament_format_id', 'Tournament Format') !!}
                    {!! Form::select('tournament_id', $t_format, null, ['placeholder'=>'Tournament Format', 'class'=>'form-control', 'name'=>'tournament_format_id','id'=>'formatSelect', 'required'])!!}
                </div> --}}
                <input type="hidden" name="tournament_format_id" value="1">

                <div class="form-group" id="roundrobin">

                  {!! Form::label('number_of_teams', 'Number of Teams') !!}
                  {!! Form::number('number_of_teams', null, ['class'=>'form-control', 'id'=>'textbox', 'min'=>'4','max'=>'10', 'required','placeholder'=>'Enter Number Of Teams'])!!}

                </div>

                  {{-- <div class="form-group hidden" id="knockout">

                      {!! Form::label('number_of_teams', 'Number of Teams') !!}
                      <select name="number_of_teams" id="selectbox" class="form-control" required>
                            <option value disabled selected>Select Number Of Teams</option>
                            <option value="4">Four</option>
                            <option value="8">Eight</option>
                      </select>

                  </div> --}}


                <div class="form-group">
                    {!! Form::label('ground_id', 'Ground') !!}
                    {{-- {!! Form::select('ground_id', $t_grounds, null, ['placeholder'=>'Ground', 'class'=>'form-control', 'name'=>'ground_id', 'required'])!!} --}}
                    <select class="form-control" name="ground_id" id="ground"></select>
                </div>



          <div class="form-group">
                    {!! Form::submit('Add Tournament', ['class'=>'btn btn-primary col-sm-3']) !!}
                </div>

                <div class="form-group">
            {!! Form::button('Cancel', ['class'=>'btn btn-danger col-sm-3', 'data-dismiss'=>'modal']) !!}
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
//         Get today's date
        var today = new Date();
        console.log(today);

        $("#datepicker").datepicker({
            format: 'yyyy-mm-dd',
            minDate: today,
            maxDate: "+1Y"
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
                    'extra': '0'
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

        $('#formatSelect').on('change input keyup',function(){
            var value = $('#formatSelect').val();
            if (value == 1)
            {
                $('#roundrobin').removeClass('hidden');
                $('#knockout').addClass('hidden');
                $('#selectbox').prop('disabled',true);
                $('#textbox').removeAttr('disabled');
            }
            else if (value == 2)
            {
                $('#roundrobin').addClass('hidden');
                $('#knockout').removeClass('hidden');
                $('#textbox').prop('disabled',true);
                $('#selectbox').removeAttr('disabled');
            }
        })
    </script>




    @stop