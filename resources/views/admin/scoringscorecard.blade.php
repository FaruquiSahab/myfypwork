@extends('layouts.admin')

@section('title')
    Scoring Innings 1
@stop

@section('header')
    Scoring Innings 1
@stop
    @section('content')
    <fieldset>
        <strong>Batting Score</strong> 
        <span id="t_runs" >{{ $runs }}</span>/
        <span id="t_wickets">{{ $wicketss }}</span> In
        <sapn id="t_overs">{{ $overs }}</sapn> Overs
    </fieldset>
                    {{-- batsmen score --}}
                    <div class="table-responsive table-bordered">
                        <table class="table" id="mytable">
                            <thead>
                                <tr>
                                    <th>Batsmen</th>
                                    <th>Out How</th>
                                    <th>Out By</th>
                                    <th>Runs</th>
                                    <th>Balls</th>
                                    <th>0(s)</th>
                                    <th>1(s)</th>
                                    <th>2(s)</th>
                                    <th>3(s)</th>
                                    <th>4(s)</th>
                                    <th>6(s)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($battingfirst as $keyb=>$value)
                                <div>
                                    <form class="batsmen" data-key="{{ $keyb }}">
                                        {{ csrf_field() }}
                                        <input id="match_id{{ $keyb }}" type="hidden" name="match_id" value="{{ $matches[0]->id }}">
                                        <input id="innings_no{{ $keyb }}" type="hidden" name="innings_no" value="{{ $value->inning_no }}">
                                        <tr id="row{{ $keyb }}">
                                          <td>
                                            {{ $value->batsmen->name }}
                                            <input id="batsmen_id{{ $keyb }}" type="hidden" name="batsmen_id" value="{{ $value->batsmen->id }}">
                                          </td>
                                          <td>
                                            <select style="width: 100%;" id="{{ $keyb }}" name="out_how" class="form-control outhow">
                                              <option disabled selected value>Select Wicket Type</option>
                                              <option value="nt" @if($value->out_how == 'nt') selected @endif>Not Out</option>
                                              <option value="rt" @if($value->out_how == 'rt') selected @endif>Retired Hut</option>
                                              <option value="dnb"@if($value->out_how == 'dnb') selected @endif>Did Not Bat</option>
                                              @foreach($wickets as $key=>$values)
                                                <option value="{{ $values->value }}" @if($value->out_how == $values->value) selected @endif>{{ $values->name }}</option>
                                              @endforeach
                                            </select>
                                          </td>
                                          <td>
                                            @if($value->out_how == 'nt' || $value->out_how == 'rt' ||  $value->out_how == 'dnb' || $value->out_how == 'ro') 
                                                <select style="width: 100%;" id="out_by_{{ $keyb }}" name="out_by" class="form-control" disabled>
                                            @else
                                                <select style="width: 100%;" id="out_by_{{ $keyb }}" name="out_by" class="form-control">
                                            @endif
                                                    <option disabled selected value>Select Bowler</option>
                                                    @foreach($ballingfirst as $key=>$valuee)
                                                        @if($valuee->bowler->role_id == 2 || $valuee->bowler->role_id == 3 )
                                                            <option value="{{ $valuee->bowler->id }}" @if($value->out_by == $valuee->bowler->id) selected @endif>
                                                                {{ $valuee->bowler->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                          </td>
                                          <td><input id="runs{{ $keyb }}" placeholder="Auto"  value="{{ $value->runs }}" disabled type="number" name="runs" min="0" max="200"></td>
                                          <td><input id="balls{{ $keyb }}" placeholder="Auto" value="{{ $value->balls }}" disabled type="number" name="balls" min="0" max="200"></td>
                                          <td><input id="dots{{ $keyb }}" @if($value->out_how == 'dnb') readonly @endif type="number" min="0" value="{{ $value->dots }}"  max="100" name="dots"></td>
                                          <td><input id="ones{{ $keyb }}" @if($value->out_how == 'dnb') readonly @endif type="number" min="0" value="{{ $value->ones }}"  max="30" name="ones"></td>
                                          <td><input id="twos{{ $keyb }}" @if($value->out_how == 'dnb') readonly @endif type="number" min="0" max="30" value="{{ $value->twos }}"  name="twos"></td>
                                          <td><input id="threes{{ $keyb }}" @if($value->out_how == 'dnb') readonly @endif type="number" min="0" max="30" value="{{ $value->threes }}"  name="threes"></td>
                                          <td><input id="fours{{ $keyb }}" @if($value->out_how == 'dnb') readonly @endif type="number" min="0" max="30" value="{{ $value->fours }}"  name="fours"></td>
                                          <td><input id="sixes{{ $keyb }}" @if($value->out_how == 'dnb') readonly @endif type="number" min="0" max="30"  value="{{ $value->sixes }}"  name="sixes"></td>
                                          <td><button type="submit" class="btn">Submit</button></td>
                                        </tr>
                                    </form>
                                </div>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <fieldset>
                        <strong>Bowling Score</strong>
                        <span id="t_runs1" >{{ $runs1 }}</span>/
                        <span id="t_wickets1">{{ $wicketss1 }}</span> In
                        <sapn id="t_overs1">{{ $overs1 }}</sapn> Overs
                    </fieldset>                            
                    {{-- bowler score --}}
                    <div>
                        <table class="table table-responsive table-bordered" id="mytable2">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Bowler Name</th>
                                    <th>Overs</th>
                                    <th>Maidens</th>
                                    <th>Runs</th>
                                    <th>Wickets</th>
                                    <th>Economy</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ballingfirst as $key=>$value)
                                <form class="bowler" data-key="{{ $key }}">
                                    {{ csrf_field() }}
                                    <tr id="rows{{ $key }}">
                                        <input id="match_ids{{ $key }}" type="hidden" name="match_id" value="{{ $matches[0]->id }}">
                                        <input id="innings_nos{{ $key }}" type="hidden" name="innings_no" value="{{ $value->inning_no }}">
                                        <td>
                                            {{ $value->bowler->name }}
                                            <input id="bowler_id{{ $key }}" type="hidden" name="bowler_id" value="{{ $value->bowler->id }}">
                                        </td>
                                        @if($matches[0]->match_type_id == 1)
                                            <td><input id="overs{{ $key }}" type="number" step="0.1" min="0" max="4" name="overs" value="{{ $value->overs }}"></td>
                                            <td><input id="maidens{{ $key }}" type="number" min="0.0" max="4.0" name="maidens" value="{{ $value->maidens }}"></td>
                                            <td><input id="runss{{ $key }}" type="number" min="0" max="80" name="runs" value="{{ $value->runs }}"></td>
                                            <td><input id="wickets{{ $key }}" type="number" min="0" max="10" name="wickets" value="{{ $value->wickets }}"></td>
                                            <td><input disabled id="eco{{ $key }}" type="number" min="0" max="40" value="{{ $value->economy }}"></td>
                                            <td><button class="btn">Submit</button></td>
                                        @elseif($matches[0]->match_type_id == 2)
                                            <td><input id="overs{{ $key }}" type="number" step="0.1" min="0" max="10" name="overs" value="{{ $value->overs }}"></td>
                                            <td><input id="maidens{{ $key }}" type="number" min="0.0" max="10.0" name="maidens" value="{{ $value->maidens }}"></td>
                                            <td><input id="runss{{ $key }}" type="number" min="0" max="80" name="runs" value="{{ $value->runs }}"></td>
                                            <td><input id="wickets{{ $key }}" type="number" min="0" max="10" name="wickets" value="{{ $value->wickets }}"></td>
                                            <td><input disabled id="eco{{ $key }}" type="number" min="0" max="40" value="{{ $value->economy }}"></td>
                                            <td><button type="submit" class="btn">Submit</button></td>
                                        @endif
                                    </tr>
                                </form>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>

                    {{-- extras --}}
                        <strong>Extras </strong><span id="extras">{{ $total_extras }}</span>
                        <div class="table-responsive table-bordered col-sm-12">
                                <table class="table" id="mytable1">
                                    <thead>
                                        <tr>
                                            <th>Wides</th>
                                            <th>No Balls</th>
                                            <th>Byes</th>
                                            <th>Leg Byes</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <form class="extras">
                                            <tr>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input id="innings_extra" type="hidden" name="innings_no" value="{{ $extra[0]->inning_no }}">
                                                <input id="match_extra" type="hidden" name="innings_no" value="{{ $extra[0]->match_id }}">
                                                <td><input class="form-control" id="wides" type="number" name="wides" value="{{ $extra[0]->wides }}"></td>
                                                <td><input class="form-control" id="noballs" type="number" name="no_balls" value="{{ $extra[0]->no_balls }}"></td>
                                                <td><input class="form-control" id="byes" type="number" name="byes" value="{{ $extra[0]->byes }}"></td>
                                                <td><input class="form-control" id="legbyes" type="number" name="leg_byes" value="{{ $extra[0]->leg_byes }}"></td>
                                                <td><button type="submit" class="btn">Submit</button></td>
                                            </tr>
                                        </form>
                                    </tbody>
                                </table>
                        </div>
                        <br>
                    {{-- extras --}}

                    {{--begin fall of wickets --}}
                        {{--  <strong>Fall Of Wickets</strong>
                        <style type="text/css">
                            .tb_horizantal table { border-collapse: collapse; }
                            .tb_horizantal tr  { display: block; float: left; }
                            .tb_horizantal th , .tb_horizantal td { display: block; }
                        </style>
                        <div class=" table-responsive table-bordered tb_horizantal col-sm-12">
                            <table class="table" id="_mytable">
                                <tr>
                                    <th>#</th>
                                    <th>Score</th>
                                    <th>Action</th>
                                </tr>
                                @for($i=1; $i<=10; $i++)
                                    <form class="fow">
                                        <tr>
                                            <td><input id="wicket_no{{ $i }}" type="number" min="0" max="10"  name="wicket_no" readonly value="{{ $i }}"></td>
                                            <td><input id="score{{ $i }}" type="number" min="0" max="500" name="score"></td>
                                            <td><button type="submit" class="btn">Submit</button></td>
                                        </tr>
                                    </form>
                                @endfor
                            </table>
                        </div>  --}}
                        <br>
                    {{-- end fall of wickets --}}

                    {{--begin overs --}}
                        {{-- <strong>Runs Per Over</strong>
                        <style type="text/css">
                            .tb_horizantal table { border-collapse: collapse; }
                            .tb_horizantal tr  { display: block; float: left; }
                            .tb_horizantal th , .tb_horizantal td { display: block; }
                        </style>
                        <div class="table-responsive table-bordered tb_horizantal col-sm-12">
                            <table class="table">
                                <tr>
                                    <th>Over</th>
                                    <th>Runs</th>
                                    <th>Action</th>
                                </tr>
                                @if($matches[0]->match_type_id == 1)
                                @for($i=0; $i<20; $i++)
                                <tr>
                                    <td><input type="number" name="over_no" min="0" max="20" value="{{ $i+1 }}" readonly></td>
                                    <td><input type="number" name="runs" min="0" max="36"></td>
                                    <td><button type="submit" class="btn">Submit</button></td
                                </tr>
                                @endfor
                                @elseif($matches->match_type_id == 2)
                                    @for($i=0; $i<50; $i++)
                                        <tr>
                                            <td><input type="number" name="over_no" min="0" max="20" value="{{ $i+1 }}" readonly></td>
                                            <td><input type="number" name="runs" min="0" max="36"></td>
                                            <td><button type="submit" class="btn">Submit</button></td
                                        </tr>
                                    @endfor
                                @endif
                            </table>
                        </div> --}}
                    {{-- end overs --}}
                    <br><br>
                    <button class="hidden btn" id="endbtn0">Customize Score</button>
                    <button style="margin-left: 85%" id="endbtn1" class="btn btn-success">Validate Total Score</button>
                    <form action="{{ route('updateandproceed',$matches[0]->id) }}">
                        <button type="submit" style="margin-left: 87%" id="endbtn2"class="hidden btn btn-success">Proceed To 2nd Innings</button>
                    </form>
                    <br><br>
                    <input type="hidden" id="checknotout" value="{{ $checknotout }}">
	@stop

    @section('scripts')
        <script type="text/javascript">

            $('#endbtn1').on('click',function()
            {
                var max = 0;
                if({{ $format }} == 1)
                {
                    max = 20;
                }
                else if({{ $format }} == 2)
                {
                    max = 50;
                }
                if($('#t_overs').text() > max || $('#t_overs1').text() > max)
                {
                    toastr.warning('Record Overs Are More Than Allowed','Validation Message');
                }
                else
                {
                    if( ($('#t_wickets').text()) < 10 && ($('#t_overs').text()< max) )
                    {
                        toastr.warning('Human Error Cannot Proceed','Validation Message');
                    }
                    else
                    {
                        if($('#t_runs').text() == $('#t_runs1').text())
                        {
                            if($('#t_overs').text() == $('#t_overs1').text())
                            {
                                if($('#t_wickets').text() == $('#t_wickets1').text())
                                {
                                    if ($('#checknotout').val() > 2)
                                    {
                                        toastr.warning('More Than Two Players Are Marked As Notout Which Is Immpossible','Validation Message');
                                    }
                                    else if ($('#checknotout').val() < 1)
                                    {
                                         toastr.warning('Less Than Single Player Is Marked As Notout Which Is Immpossible','Validation Message');
                                    }
                                    else
                                    {
                                        toastr.info('All Records Are Equal You May Proceed Now','Proceed To Next');
                                        $('input').prop('disabled',true);
                                        $('button').prop('disabled',true);
                                        $('#endbtn0').removeClass('hidden');
                                        $('#endbtn0').removeAttr('disabled');
                                        $('#endbtn1').addClass('hidden');
                                        $('#endbtn2').removeClass('hidden');
                                        $('#endbtn2').removeAttr('disabled');
                                    }
                                }
                                else{
                                    toastr.warning('Wickets Recorded Through Batting Scorecard and Bowling Scorecard Are Not Equal','Validation Message');
                                }
                            }
                            else{
                                toastr.warning('Overs Recorded Through Batting Scorecard and Bowling Scorecard Are Not Equal','Validation Message');
                            }
                        }
                        else
                        {
                            toastr.warning('Runs Score Through Batting Scorecard and Bowling Scorecard Are Not Equal','Validation Message');
                        }
                    }
                }
                
            });
            $('#endbtn0').on('click',function(){
                location.reload();
                $('input').removeAttr('disabled');
                $('button').removeAttr('disabled');
                $('#endbtn0').addClass('hidden');
            })
            /*$('table').DataTable(
                {
                    'searching':false,
                    'info':false,
                    'bPaginate': false,
                    "ordering": false
                }
            );*/
            $(document).ready(function(){
                $('input').prop('required',true);
                $('select').prop('required',true);
                // $('input').val(0);
            });
            $(document).on('change paste keyup keydown keypress', 'input[type=number]', function()
            {
                var abc = $(this).val();
                var cba = abc.toString().split(".")[1];

                if (cba >= 6)
                {
                    console.log('agae')
                    var xyz = Math.round(abc);
                    $(this).val(xyz);
                    console.log('xyz')
                    console.log(xyz);
                }
            });
            $(document).on('change select','.outhow',function()
            {
                console.log('Hello');
                var key = $(this).attr('id');//working
                console.log($(this).val())
                if ($(this).val() == 'nt' || $(this).val() == 'rt' || $(this).val() == '8' || $(this).val() == '9')
                {
                    $('#out_by_'+key).prop('disabled',true);
                }
                else if($(this).val() == 'dnb')
                {
                    var id = $('#batsmen_id'+key).val();
                    $('#row'+key+' input').val('0');
                    $('#row'+key+' input').prop('readonly',true);
                    $('#out_by_'+key).prop('disabled',true);
                    $('#batsmen_id'+key).val(id);
                }
                else
                {
                    $('#row'+key+' input').removeAttr('readonly');
                    $('#out_by_'+key).removeAttr('disabled');
                }
            })
            $(document).on('submit', '.batsmen', function(event)
            {
                event.preventDefault();
                var key = $(this).data('key');
                console.log('Key: '+key);
                // var data = $(this).serialize();
                // console.log(data);

                $.ajax({
                    url: '{{ route('submitbatsmenscore') }}',
                    type: 'POST',
                    data: {
                        '_token':$('input[name="_token"]').val(),
                        'match_id':$('#match_id'+key).val(),
                        'innings_no':$('#innings_no'+key).val(),
                        'batsmen_id':$('#batsmen_id'+key).val(),
                        'out_how':$('#'+key).val(),
                        'out_by':$('#out_by_'+key).val(),
                        'dots':$('#dots'+key).val(),
                        'ones':$('#ones'+key).val(),
                        'twos':$('#twos'+key).val(),
                        'threes':$('#threes'+key).val(),
                        'fours':$('#fours'+key).val(),
                        'sixes':$('#sixes'+key).val(),
                    },
                    success:function(data)
                    {
                        console.log(data);
                        var data1 = JSON.parse(data[1],true);
                        console.log(data1);
                        $('#runs'+key).val(data[0][0]['runs']);
                        $('#balls'+key).val(data[0][0]['balls']);
                        $('#t_runs').text(data1['runs']);
                        $('#t_wickets').text(data1['wickets']);
                        $('#t_overs').text(data1['overs']);
                        $('#checknotout').val(data1['checknotout']);
                        
                        toastr.success('Data Submitted Successfully','Success Alert',{timeOut: 3000});
                    },
                    error:function()
                    {
                        toastr.error('Coresponding Server Is Down','Error Alert',{timeOut: 3000});
                    }
                });

            });
            $(document).on('submit', '.bowler', function(event)
            {
                event.preventDefault();
                console.log('Key');
                var key = $(this).data('key');
                console.log(key);
                // var data = $(this).serialize();
                // console.log(data);



                $.ajax({
                    url: '{{ route('submitbowlerscore') }}',
                    type: 'POST',
                    data: {
                        '_token':$('input[name="_token"]').val(),
                        'match_id':$('#match_id'+key).val(),
                        'innings_no':$('#innings_nos'+key).val(),
                        'bowler_id':$('#bowler_id'+key).val(),
                        'overs':$('#overs'+key).val(),
                        'runs':$('#runss'+key).val(),
                        'maidens':$('#maidens'+key).val(),
                        'wickets':$('#wickets'+key).val(),
                    },
                    success:function(data)
                    {
                        console.log(data);
                        var data1 = JSON.parse(data[1],true);
                        $('#eco'+key).val(data[0][0]['economy']);
                        $('#t_runs1').text(data1['runs']);
                        $('#t_wickets1').text(data1['wickets']);
                        $('#t_overs1').text(data1['overs']);
                        toastr.success('Data Submitted Successfully','Success Alert',{timeOut: 3000});
                    },
                    error:function()
                    {
                        toastr.error('Coresponding Server Is Down','Error Alert',{timeOut: 3000});
                    }
                });

            });

            $(document).on('submit','.extras',function(event)
            {
                event.preventDefault();
                $.ajax({
                    url:'{{ route('submitextrascore') }}',
                    type:'POST',
                    data:{
                        '_token': $('input[name="_token"]').val(),
                        'match_id': $('#match_extra').val(),
                        'inning_no': $('#innings_extra').val(),
                        'wides' : $('#wides').val(),
                        'no_balls': $('#noballs').val(),
                        'byes'  : $('#byes').val(),
                        'leg_byes': $('#legbyes').val()
                    },
                    success:function(data)
                    {
                        console.log(data);
                        data = JSON.parse(data,true);
                        console.log(data);
                        $('#t_runs').text(data['runss']);
                        $('#t_runs1').text(data['runs1']);
                        $('#extras').text(data['extras']);
                    },
                    error:function()
                    {
                        toastr.error('Coresponding Server Is Down','Error Alert');
                    }
                });
            });
        </script>
    @stop

