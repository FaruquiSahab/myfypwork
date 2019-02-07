@extends('layouts.admin')
	@section('content')
        
                    
                    
                    {{-- batsmen score --}}                    
                    <div class="table-responsive table-bordered col-sm-12">          
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
                              @foreach($battingfirst as $key=>$value)
                                <div>
                                    <form class="batsmen">
                                        <tr>
                                          <td>
                                            {{ $value->player->name }}
                                            <input type="hidden" name="batsmen_id" value="{{ $value->player->id }}">
                                          </td>
                                          <td><select name="out_how" class="btn">
                                              <option value="0" disabled selected>Select Wicket Type</option>
                                              <option value="nt">Not Out</option>
                                              <option value="rt">Retired Hut</option>
                                              <option value="dnb">Did Not Bat</option>
                                              @foreach($wickets as $key=>$value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                              @endforeach
                                          </select></td>
                                          <td><select name="out_by" class="btn">
                                            <option value="0" disabled selected>Select Bowler</option>
                                            @foreach($ballingfirst as $key=>$value)
                                                @if($value->player->role_id == 2 || $value->player->role_id == 3 )
                                                    <option value="{{ $value->player->id }}">{{ $value->player->name }}</option>
                                                @endif
                                            @endforeach
                                          </select></td>
                                          <td><input placeholder="auto" value="0" readonly type="number" name="runs" min="0" max="200"></td>
                                          <td><input placeholder="auto" value="0" readonly type="number" name="balls" min="0" max="200"></td>
                                          <td><input type="number" min="0" max="100" name="dots"></td>
                                          <td><input type="number" min="0" max="30" name="ones"></td>
                                          <td><input type="number" min="0" max="30" name="twos"></td>
                                          <td><input type="number" min="0" max="30" name="threes"></td>
                                          <td><input type="number" min="0" max="30" name="fours"></td>
                                          <td><input type="number" min="0" max="30" name="sixes"></td>
                                          <td><button type="submit" class="btn">Submit</button></td>
                                        </tr>
                                    </form>
                                </div>
                              @endforeach
                            </tbody>
                        </table>
                    </div> 
                    <br>

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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ballingfirst as $key=>$value)
                                @if($value->player->role_id == 2 || $value->player->role_id == 3 )
                                <form class="bowler">
                                    <tr>
                                        <td>
                                            {{ $value->player->name }}
                                            <input type="hidden" name="bowler_id" value="{{ $value->player->id }}">
                                        </td>
                                        @if($matches[0]->match_type_id == 1)
                                        <td><input type="number" step="0.1" min="0.0" max="4.0" name="overs"></td>
                                        <td><input type="number" min="0.0" max="4.0" name="maidens"></td>
                                        <td><input type="number" min="0" max="80" name="runs"></td>
                                        <td><input type="number" min="0" max="10" name="wickets"></td>
                                        <td><button class="btn">Submit</button></td>
                                        @elseif($matches[0]->match_type_id == 2)
                                        <td><input type="number" step="0.1" min="0.0" max="10.0" name="overs"></td>
                                        <td><input type="number" min="0.0" max="10.0" name="maidens"></td>
                                        <td><input type="number" min="0" max="80" name="runs"></td>
                                        <td><input type="number" min="0" max="10" name="wickets"></td>
                                        <td><button type="submit" class="btn">Submit</button></td>
                                        @endif
                                    </tr>
                                </form>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>  
                    <br>

                    {{-- extras --}}
                    <strong>Extras</strong>
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
                                            <td><input type="number" name="wides"></td>
                                            <td><input type="number" name="no_balls"></td>
                                            <td><input type="number" name="byes"></td>
                                            <td><input type="number" name="leg_byes"></td>
                                            <td><button type="submit" class="btn">Submit</button></td>
                                        </tr>
                                    </form>
                                </tbody>
                            </table>
                    </div>     
                    <br>
                    {{-- fall of wickets --}}

                    <strong>Fall Of Wickets</strong>                    
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
                                        <td><input type="number" min="0" max="10"  name="wicket_no" readonly value="{{ $i }}"></td>
                                        <td><input type="number" min="0" max="500" name="score"></td>
                                        <td><button type="submit" class="btn">Submit</button></td
                                    </tr>
                                </form>
                            @endfor
                        </thead>
                    </div>
                    <br>    

                    {{-- overs --}}
                    <strong>Runs Per Over</strong>
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
                    </div>
	@stop

    @section('scripts')
        <script type="text/javascript">
            $(document).ready(function(){
                // $('input').prop('required',true);
                // $('select').prop('required',true);
                // $('input').val(0);
            });
            $(document).on('change paste', 'input[type=number]', function()
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
            $(document).on('submit', '.batsmen', function(event) {
                event.preventDefault();
                console.log($(this).serialize());
                var data = $(this).serialize();

                var abcc = data.split('&')[3];
                var xyzz = abcc.split('=')[1];

                var abcd = data.split('&')[4];
                var xyzx = abcd.split('=')[1];

                var abce = data.split('&')[5];
                var xyzc = abce.split('=')[1];

                var abcf = data.split('&')[6];
                var xyzv = abcf.split('=')[1];

                var abcg = data.split('&')[7];
                var xyzb = abcg.split('=')[1];

                var abch = data.split('&')[8];
                var xyzn = abch.split('=')[1];

                var balls = (+xyzz)+(+xyzx)+(+xyzc)+(+xyzv)+(+xyzb)+(+xyzn);
                console.log(balls);

                // var bnm = $(this).find('input[name=balls]')['context'][0];
                // console.log(bnm);
                // console.log($(this).children('input').each());
                // find('input[name=balls]').val())



            });
        </script>
    @stop

	