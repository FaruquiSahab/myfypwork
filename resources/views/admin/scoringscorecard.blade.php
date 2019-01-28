@extends('layouts.admin')
	@section('content')
  {{-- {{ $match }} --}}
                		{{-- total balls --}}
                	{{-- <input type="hidden" id="total" name="total" value="1"> --}}
                		{{-- Total Runs in an over --}}
                	{{-- <input type="hidden" name="runs" id="runs" value="0"> --}}
                		{{-- no of over --}}
                	{{-- <input type="hidden" name="over" id="over" value="1"> --}}

                	{{-- <div>
                        Over:<span id="overNo"></span>
                    </div> --}}

                    {{-- <div id="ballsbyballs">
                    	<select style="width: 15%; margin:10%;" class="sel form-control col-sm-9">
                    		<option selected="selected">Select Action</option>
                            @foreach($options as $option)
                            <option data-legal="{{ $option->legal }}" value="{{ $option->value }}">{{ $option->name }}</option>
                            @endforeach
                    	</select>
                        <form>
                            <input type="hidden" name="match_id" value="1">
                            <input type="hidden" name="batsmen_id" value="1">
                            <input type="hidden" name="bowler_id" value="1">
                            <input type="hidden" name="runs">
                            <input type="hidden" name="legal">

                            <input type="submit" style="width: 10%; margin: 10%" class="btn btn-success col-sm-3" value="Score">
                        </form>
                    </div>
 --}}
                	{{-- <div class="hidden" id="extra">
                		<select style="width: 15%;" class="exSel form-control" name="">
                			<option selected="selected">Select Action</option>
                            @foreach($optionsE as $option)
                            <option  value="{{ $option->value }}">{{ $option->name }}</option>
                            @endforeach
                		</select>
                	</div>

                	<div class="hidden" id="wicket">
                		<select style="width: 15%;" class="wSel form-control" name="">
                			<option selected="selected">Select Action</option>
                            @foreach($wickets as $wicket )
                            <option value="{{ $wicket->value }}">{{ $wicket->name }}</option>
                            @endforeach
                		</select>
                	</div>

                	<div class="hidden" id="player">
                		<select style="width: 15%;" class="pSel form-control" name="">
                			<option selected="selected">Select Action</option>
                			<option value="1">Alpha</option>
                			<option value="2">Bravo</option>
                		</select>
                	</div> --}}
                    
                    <br>
                    
                    {{-- batsmen score --}}                    
                    <div class="table-responsive table-bordered col-sm-12">          
                        <table class="table" id="mytable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Batsmen</th>
                                    <th>Out How</th>
                                    <th>Out By</th>
                                    <th>Runs</th>
                                    <th>Balls</th>
                                    <th>4s</th>
                                    <th>6s</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($batting1 as $key=>$value)
                                <tr data-id="{{ $value->id }}">
                                  <td>{{ $key+1 }}</td>
                                  <td>{{ $value->player->name }}</td>
                                  <td>
                                    <select style="width:60%" class="form-control">
                                      <option disabled="disabled" selected="selected">Select Wicket Type</option>
                                      <option value="0">Not Out</option>
                                      @foreach($wickets as $a=>$value)
                                        <option value="{{ $value->id }}">{{ $a+1 }}. {{ $value->name }} </option>
                                      @endforeach
                                    </select>
                                  </td>
                                  <td>
                                    <select style="width:60%" class="form-control">
                                      <option disabled="disabled" selected="selected">Select Bowler</option>
                                      @foreach($bowling1 as $b=>$values)
                                        @if($values->player->role->name == 'Bowler')
                                          <option value="{{ $values->player_id }}">{{ $values->player->name }}</option>
                                        @elseif($values->player->role->name == 'All-Rounder')
                                          <option value="{{ $values->player_id }}">{{ $values->player->name }}</option>
                                        @endif
                              @endforeach
                                    </select>
                                  </td>
                                  <td>
                                    <input style="width:60%" min="0" max="300" type="number" name="" class="form-control">
                                  </td>
                                  <td>
                                    <input style="width:60%" min="0" max="300" type="number" name="" class="form-control">
                                  </td>
                                  <td>
                                    <input style="width:60%" min="0" max="300" type="number" name="" class="form-control">
                                  </td>
                                  <td>
                                    <input style="width:60%" min="0" max="300" type="number" name="" class="form-control">
                                  </td>
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
                                    {{-- <th>#</th> --}}
                                    <th>Bowler Name</th>
                                    <th>Overs</th>
                                    <th>Maidens</th>
                                    <th>Runs</th>
                                    <th>Wickets</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($bowling1 as $key=>$values)
                              @if($values->player->role->name == 'Bowler' || $values->player->role->name == 'All-Rounder')
                              <tr>

                                {{-- <td>{{ $i }}</td> --}}
                                  <td value="{{ $values->player_id }}">{{ $values->player->name }}</td>
                                <td>
                                  <input pattern="([0-9]{1,2}).([0-6]{1})" style="width:40%" min="0.0" max="10.0" type="number" name="" class="form-control">
                                </td>
                                <td>
                                  <input style="width:40%" min="0" max="10" type="number" name="" class="form-control">
                                </td>
                                <td>
                                  <input style="width:40%" min="0" max="150" type="number" name="" class="form-control">
                                </td>
                                <td>
                                  <input style="width:40%" min="0" max="10" type="number" name="" class="form-control">
                                </td>
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
                                <tbody>
                                  {{-- @foreach()
                                    <tr>
                                      <td></td>
                                    </tr>
                                  @endforeach --}}
                                </tbody>
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
                            <tbody>
                              {{-- @foreach()
                                <tr>
                                  <td></td>
                                </tr>
                              @endforeach --}}
                            </tbody>
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
                            <tbody>
                              {{-- @foreach()
                                <tr>
                                  <td></td>
                                </tr>
                              @endforeach --}}
                            </tbody>
                        </table>
                    </div>
	@stop

	@section('scripts')
    
	@stop