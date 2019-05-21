@extends('layouts.admin')

@section('title')
    Scorecard {{ $clubname1 }} vs {{ $clubname2 }}
@stop

@section('header')
    Scorecard {{ $clubname1 }} vs {{ $clubname2 }}
@stop

    @section('content')
        <fieldset style="border: 2px solid #ebebe0;">
            <br>
            <b style="font-size: larger; margin-left: 5px;">o {{ $clubname1 }}</b>: <span  style="font-size: larger;">{{ $inningscorefirst->runs }}/{{ $inningscorefirst->wickets }}, {{ $inningscorefirst->overs }} Overs <br></span>
            <b style="font-size: larger; margin-left: 5px;">o {{ $clubname2 }}</b>: <span  style="font-size: larger;">{{ $inningscoresecond->runs }}/{{ $inningscoresecond->wickets }}, {{ $inningscoresecond->overs }} Overs</span>
            <br>
             <span style="margin-left: 5px;">o Result:</span> 
            <b>
              {{ $result }}  
            </b>
            <br>
        </fieldset>
        <button class="btn btn-success" >{{ $clubname1 }} Score</button>
        <button class="btn btn-warning" >{{ $clubname2 }} Score</button>
        <br>
                <div class="firstinning hidden">
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
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($batfirst as $keyb=>$value)
                                    <div>
                                        @if($value->out_how != 'dnb')
                                                <tr id="row{{ $keyb }}">
                                                  <td>{{ $value->batsmen->name }}</td>
                                                  <td>
                                                    @if($value->out_how == 'b')
                                                        Bowled
                                                    @elseif($value->out_how == 'ct')
                                                        Caught
                                                    @elseif($value->out_how == 'lbw')
                                                        LBW
                                                    @elseif($value->out_how == 'otf')
                                                        Obs Field
                                                    @elseif($value->out_how == 'hw')
                                                        Hit Wicket
                                                    @elseif($value->out_how == 'hb')
                                                        Handle Ball
                                                    @elseif($value->out_how == 'ht')
                                                        Hit Twice
                                                    @elseif($value->out_how == 'to')
                                                        Time Out
                                                    @elseif($value->out_how == 'ro')
                                                        Run Out
                                                    @elseif($value->out_how == 'nt')
                                                        Not Out
                                                    @else
                                                    @endif
                                                  </td>
                                                  <td>{{ $value->bowler->name ?? '--' }}</td>
                                                  <td>{{ $value->runs }}</td>
                                                  <td>{{ $value->balls }}</td>
                                                  <td>{{ $value->dots }}</td>
                                                  <td>{{ $value->ones }}</td>
                                                  <td>{{ $value->twos }}</td>
                                                  <td>{{ $value->threes }}</td>
                                                  <td>{{ $value->fours }}</td>
                                                  <td>{{ $value->sixes }}</td>
                                                </tr>
                                        @endif
                                    </div>
                                  @endforeach
                                  @foreach($batfirst as $keyb=>$value)
                                    <div>
                                            @if($value->out_how == 'dnb')
                                                <tr id="row{{ $keyb }}">
                                                  <td>{{ $value->batsmen->name }}</td>
                                                  <td>
                                                    @if($value->out_how == 'dnb')
                                                        Did Not Bat
                                                    @else
                                                    @endif
                                                  </td>
                                                  <td>--</td>
                                                  <td>--</td>
                                                  <td>--</td>
                                                  <td>--</td>
                                                  <td>--</td>
                                                  <td>--</td>
                                                  <td>--</td>
                                                  <td>--</td>
                                                  <td>--</td>
                                                </tr>
                                            @endif
                                    </div>
                                  @endforeach
                            </tbody>
                            </table>
                        </div>
                        <br>
                    {{-- batsmenscore --}}

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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ballfirst as $key=>$value)
                                        @if($value->overs != 0 || $value->overs != NULL)
                                            <tr>
                                                <td>{{ $value->bowler->name }}</td>
                                                <td>{{ $value->overs }}</td>
                                                <td>{{ $value->maidens }}</td>
                                                <td>{{ $value->runs }}</td>
                                                <td>{{ $value->wickets }}</td>
                                                <td>{{ $value->economy }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    {{-- bowler score --}}

                    {{-- extras --}}
                        <strong>Extras </strong>
                        <div class="table-responsive table-bordered col-sm-12">
                                <table class="table" id="mytable1">
                                    <thead>
                                        <tr>
                                            <th>Wides</th>
                                            <th>No Balls</th>
                                            <th>Byes</th>
                                            <th>Leg Byes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                <td>{{ $extrafirst->wides }}</td>
                                                <td>{{ $extrafirst->no_balls }}</td>
                                                <td>{{ $extrafirst->byes }}</td>
                                                <td>{{ $extrafirst->leg_byes }}</td>
                                            </tr>
                                    </tbody>
                                </table>
                        </div>
                        <br>
                    {{-- extras --}}
                </div>
                <div class="secondinning hidden">
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
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($batsecond as $keyb=>$value)
                                    <div>
                                        @if($value->out_how != 'dnb')
                                            <tr id="row{{ $keyb }}">
                                                  <td>{{ $value->batsmen->name }}</td>
                                                  <td>
                                                    @if($value->out_how == 'b')
                                                        Bowled
                                                    @elseif($value->out_how == 'ct')
                                                        Caught
                                                    @elseif($value->out_how == 'lbw')
                                                        LBW
                                                    @elseif($value->out_how == 'otf')
                                                        Obs Field
                                                    @elseif($value->out_how == 'hw')
                                                        Hit Wicket
                                                    @elseif($value->out_how == 'hb')
                                                        Handle Ball
                                                    @elseif($value->out_how == 'ht')
                                                        Hit Twice
                                                    @elseif($value->out_how == 'to')
                                                        Time Out
                                                    @elseif($value->out_how == 'ro')
                                                        Run Out
                                                    @elseif($value->out_how == 'nt')
                                                        Not Out
                                                    @else
                                                    @endif
                                                  </td>
                                                  <td>{{ $value->bowler->name ?? '--' }}</td>
                                                  <td>{{ $value->runs }}</td>
                                                  <td>{{ $value->balls }}</td>
                                                  <td>{{ $value->dots }}</td>
                                                  <td>{{ $value->ones }}</td>
                                                  <td>{{ $value->twos }}</td>
                                                  <td>{{ $value->threes }}</td>
                                                  <td>{{ $value->fours }}</td>
                                                  <td>{{ $value->sixes }}</td>
                                            </tr>
                                        @endif
                                    </div>
                                  @endforeach
                                  @foreach($batsecond as $keyb=>$value)
                                    @if($value->out_how == 'dnb')
                                        <tr id="row{{ $keyb }}">
                                            <td>{{ $value->batsmen->name }}</td>
                                            <td>
                                                @if($value->out_how == 'dnb')
                                                    Did Not Bat
                                                @else
                                                @endif
                                            </td>
                                            <td>--</td>
                                            <td>--</td>
                                            <td>--</td>
                                            <td>--</td>
                                            <td>--</td>
                                            <td>--</td>
                                            <td>--</td>
                                            <td>--</td>
                                            <td>--</td>
                                        </tr>
                                    @endif
                                  @endforeach
                            </tbody>
                            </table>
                        </div>
                        <br>
                    {{-- batsmenscore --}}

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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ballsecond as $key=>$value)
                                        @if($value->overs != 0 || $value->overs != NULL)
                                            <tr>
                                                <td>
                                                    {{ $value->bowler->name }}
                                                </td>
                                                <td>{{ $value->overs }}</td>
                                                <td>{{ $value->maidens }}</td>
                                                <td>{{ $value->runs }}</td>
                                                <td>{{ $value->wickets }}</td>
                                                <td>{{ $value->economy }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    {{-- bowler score --}}
                    
                    {{-- extras --}}
                        <strong>Extras </strong>
                        <div class="table-responsive table-bordered col-sm-12">
                                <table class="table" id="mytable1">
                                    <thead>
                                        <tr>
                                            <th>Wides</th>
                                            <th>No Balls</th>
                                            <th>Byes</th>
                                            <th>Leg Byes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $extrasecond->wides }}</td>
                                            <td>{{ $extrasecond->no_balls }}</td>
                                            <td>{{ $extrasecond->byes }}</td>
                                            <td>{{ $extrasecond->leg_byes }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                        <br>
                    {{-- extras --}}
                </div>              
    @stop

    @section('scripts')
        <script type="text/javascript">
            $('.btn-success').on('click',function(){
                $('.firstinning').removeClass('hidden');
                $('.secondinning').addClass('hidden');
            });
            $('.btn-warning').on('click',function(){
                $('.secondinning').removeClass('hidden');
                $('.firstinning').addClass('hidden');
            });
        </script>
    @stop
