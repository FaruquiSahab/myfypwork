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
                                    <th>1(s)</th>
                                    <th>2(s)</th>
                                    <th>3(s)</th>
                                    <th>4(s)</th>
                                    <th>6(s)</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($battingfirst as $key=>$value)
                                <tr>
                                  <td>{{ $value->player->name }}</td>
                                  <td><input type="text" name=""></td>
                                  <td><select>
                                    <option>Select Bowler</option>
                                    @foreach($battingsecond as $keys=>$value)
                                      <option>{{ $value->player->name }}</option>
                                    @endforeach
                                  </select></td>
                                  <td><input readonly type="number" name=""></td>
                                  <td><input readonly type="number" name=""></td>
                                  <td><input type="number" name=""></td>
                                  <td><input type="number" name=""></td>
                                  <td><input type="number" name=""></td>
                                  <td><input type="number" name=""></td>
                                  <td><input type="number" name=""></td>
                                </tr>
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ballingfirst as $key=>$value)
                                @if($value->player->role_id == 2 || $value->player->role_id == 3 )
                                <tr>
                                    <td>{{ $value->player->name }}</td>
                                    @if($matches[0]->match_type_id == 1)
                                    <td><input type="number" step="0.1" min="0.0" max="4.0" name=""></td>
                                    <td><input type="number" step="0.1" min="0.0" max="4.0" name=""></td>
                                    @elseif($matches[0]->match_type_id == 2)
                                    <td><input type="number" step="0.1" min="0.0" max="10.0" name=""></td>
                                    <td><input type="number" step="0.1" min="0.0" max="10.0" name=""></td>
                                    @endif
                                    <td><input type="number" min="0" max="200" name=""></td>
                                    <td><input type="number" min="0" max="10" name=""></td>
                                </tr>
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
                                    </tr>
                                </thead>
                            </table>
                    </div>     
                    <br>
                    {{-- fall of wickets --}}
                    <strong>Fall Of Wickets</strong>                    
                    <div class=" table-responsive table-bordered tb_horizantal col-sm-12">
                        <table class="table" id="_mytable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Score</th>
                                    <th>Batsmen</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <br>    

                    {{-- overs --}}
                    <strong>Runs Per Over</strong>
                    <div class="table-responsive table-bordered tb_horizantal col-sm-12">
                        <table class="table"id="_mytable1">
                            <thead>
                                <tr>
                                    <th>Over</th>
                                    <th>Runs</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
	@stop

	