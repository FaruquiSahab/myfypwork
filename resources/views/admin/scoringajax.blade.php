@extends('layouts.admin')
	@section('content')
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
                    	<select style="width: 15%; margin:10px;" class="sel form-control col-sm-9">
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

                            <input type="submit" style="width: 10%; margin: 10px" class="btn btn-success col-sm-3" value="Score">
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
                                    <th>Batsmen</th>
                                    <th>Out How</th>
                                    <th>Out By</th>
                                    <th>Runs</th>
                                    <th>Balls</th>
                                    <th>4s</th>
                                    <th>6s</th>
                                </tr>
                            </thead>
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

                
                <div id="perballs" class="links">
                	<p style="font-size: 23px; margin: 13px 10px 13px;" id="hs">
                	</p>
                </div>
                <div id="perover">
                	<h3 style="width: 35%;"></h3>
                	<h4 {{-- style="background: #6c6d6f; color: #fff; width: 35%;" --}}></h4>
                </div>
	@stop

	@section('scripts')
    <script type="text/javascript">

                // $('table').dataTable({searching:false, paging:false, info:false})
            $('#mytable').DataTable(
            {
                "processing": true,
                "serverSide": true,
                "searching":false,
                "paging":false,
                "info":false,
                "ajax": "/batsmenScore/"+1,
                "columns":[
                    { "data": "batsmen" },
                    { "data": "out_how" },
                    { "data": "out_by" },
                    { "data": "runs" },
                    { "data": "balls" },
                    { "data": "fours" },
                    { "data": "sixes" }
                ]
            });
            $('#mytable2').DataTable(
            {
                "processing": true,
                "serverSide": true,
                "searching":false,
                "paging":false,
                "info":false,
                "ajax": "/bowlerScore/"+1,
                "columns":[
                    { "data": "bowler" },
                    { "data": "overs" },
                    { "data": "maidens" },
                    { "data": "runs" },
                    { "data": "wickets" }
                ]
            });
            $('#_mytable').DataTable(
            {
                "processing": true,
                "serverSide": true,
                "searching":false,
                "paging":false,
                "info":false,
                "ajax": "/fallofwickets/"+1,
                "columns":[
                    // { "data": "rownum"},
                    { "data": "count" },
                    { "data": "score" }
                ]
            });
            $('#_mytable1').DataTable(
            {
                "processing": true,
                "serverSide": true,
                "searching":false,
                "paging":false,
                "info":false,
                "ajax": "/runsovers/"+1,
                "columns":[
                    // { "data": "rownum"},
                    { "data": "count" },
                    { "data": "runs" }
                ]
            });
            $('#mytable1').DataTable(
            {
                "processing": true,
                "serverSide": true,
                "searching":false,
                "paging":false,
                "info":false,
                "ajax": "/extras/"+1,
                "columns":[
                    // { "data": "rownum"},
                    { "data": "wides" },
                    { "data": "no_balls" },
                    { "data": "byes" },
                    { "data": "leg_byes" }
                ]
            });
    	// window.onbeforeunload = function(){return 'Are you sure that you want to leave this page?';};
  //   	console.log($('#over').val())

  //   	// current over
  //   	var over = $('#over').val();

  //       //Likhnay wala kaam
		// $('#overNo').append(over);
		// // slideup extras select
  //   	$('#extra').addClass('hidden');
  //   	// slideup wickets select
  //   	$('#wicket').addClass('hidden');
  //   	//sideup player select
  //   	$('#player').addClass('hidden');

  //   	// varibale counting no of balls
  //   	var a = $('#total').val();
  //   	// varibale counting no of over
  //   	var ov = $().val('#over');
  //   	// varibale counting no of runs in an over
  //   	var runs = $('#runs').val();
  //   	// varibale counting no of  total runs
  //   	var t_runs= 0;
  //   	// variable for wickets count
  //   	var wkt_cnt = 0;
  //   	//check extra no balls or wide
  //   	var ex_check=0;
  //   	// variable for outBy
  //   	var outBy = '';
  //       // current value of balls
  //       var balls = '0';

  //   	// what happens on wide/noballs/lb/bye  select
  //   	$('select.exSel').on('change select',function()
  //   	{
  //   		balls = $('select.exSel').val();
  //           //Likhnay wala kaam
  //   		$('#hs').append('+'+balls+"  ");
  //   		$('#extra').addClass('hidden');
  //   		$('select.sel').prop('disabled',false);
  //   		if ($('select.exSel').val() == 'w')
  //   		{
  //   			wkt_cnt++;
  //   			balls = 0;
  //   			if (ex_check == 1) 
  //   			{
  //   				// $('select.wSel option:nth-child(2)').attr('disabled', true);
  //   				// $('select.wSel option:nth-child(3)').attr('disabled', true);
  //   				// $('select.wSel option:nth-child(4)').attr('disabled', true);
  //   				// $('select.wSel option:nth-child(9)').attr('disabled', true);
  //   			}
  //   			$('#wicket').removeClass('hidden');
  //   		}
  //   		runs = +runs + +balls + +1;
  //   		console.log("runs "+ runs);
  //           if(+a == 6 || +a >= 6)
  //           {
  //               t_runs = +t_runs + +runs;
  //               console.log($('#hs').html());
  //                   //Likhnay wala kaam Ch
  //                       // $('#perover h3').append('End of Over '+ over +': '+$('#hs').html()+'<br> Runs Scored: '+ runs +'<br>');
  //                   //Likhnay wala kaam Ch
  //                       // $('#perover h4').html('Total Score: '+ t_runs + '/'+ wkt_cnt);
  //                   $('#hs').append('<strong style="color:green;">|</strong>');
  //                   a=0;
  //                   runs=0;
  //                   over++;
  //                   $('#overNo').html('');
  //                   //Likhnay wala kaam
  //                   $('#overNo').append(over);
  //           }

  //   	});
  //   	//
    	
  //   	// what happens on wicket select
  //   	$('select.wSel').on('change select',function()
  //   	{
  //   		balls = $('select.wSel').val();
  //           //Likhnay wala kaam
  //   		$('#hs').append('('+balls+')'+"  ");
  //   		$('#wicket').addClass('hidden');
  //   		$('select.sel').prop('disabled',false);

  //   		// if ($('select.wSel').val() == 'b' || $('select.wSel').val() == 'lb' || $('select.wSel').val() == 'of' || $('select.wSel').val() == 'hw' || $('select.wSel').val() == 'hb' || $('select.wSel').val() == 'ht' || $('select.wSel').val() == 'to') 
  //   		// {
  //   		// 	console.log('Hello World')
  //   		// }
  //   		// else if($('select.wSel').val() == 'ct' || $('select.wSel').val() == 'ro')
  //   		// {
  //   		// 	$('#player').removeClass('hidden');
  //   		// }
  //   		ex_check=0;
  //           console.log('a ki value yaha hai ye: '+a);
  //           if(+a == 6 || +a >= 6)
  //           {
  //               t_runs = +t_runs + +runs;
  //               console.log($('#hs').html());
  //                   //Likhnay wala kaam Ch
  //                       // $('#perover h3').append('End of Over '+ over +': '+$('#hs').html()+'<br> Runs Scored: '+ runs +'<br>');
  //                   //Likhnay wala kaam Ch
  //                       // $('#perover h4').html('Total Score: '+ t_runs + '/'+ wkt_cnt);
  //                   $('#hs').append('<strong style="color:green;">|</strong>');
  //                   a=0;
  //                   runs=0;
  //                   over++;
  //                   $('#overNo').html('');
  //                   //Likhnay wala kaam
  //                   $('#overNo').append(over);
  //           }
  //   	});
  //   	//
    	
  //   	//what happens on players select
  //   	$('select.pSel').on('change select',function()
  //       {
  //       });
  //   	//

  //   	//normal select JS
  //   	$('select.sel').on('change select',function()
  //   	{
  //           console.log('agae select mai');
            
  //   		console.log('a= '+a);
  //   		balls = $('select.sel').val();
  //   		// if check for normal balls, add comma with valu
  //   		if ($('select.sel').val() != 'wd' && $('select.sel').val() != 'nb' && $('select.sel').val() != 'lb' && $('select.sel').val() != 'b' && $('select.sel').val() != 'w')
  //   		{
  //   			runs = +runs + +balls;
  //   			console.log("runs "+runs); 
  //               //Likhnay wala kaam
  //   			$('#hs').append(balls+"  ");
  //   			if(+a == 6)
  //   			{
  //   				t_runs = +t_runs + +runs;
  //   				console.log($('#hs').html());
  //                   //Likhnay wala kaam Ch
  //   				    // $('#perover h3').append('End of Over '+ over +': '+$('#hs').html()+'<br> Runs Scored: '+ runs +'<br>');
  //                   //Likhnay wala kaam Ch
  //   				    // $('#perover h4').html('Total Score: '+ t_runs + '/'+ wkt_cnt);
  //   				$('#hs').append('<strong style="color:green;">|</strong>');
  //   				a=0;
  //   				runs=0;
  //   				over++;
  //   				$('#overNo').html('');
  //                   //Likhnay wala kaam
  //   				$('#overNo').append(over);
  //   			}

  //   		}
  //   		// not add commmaS
  //   		else {
  //               //Likhnay wala kaam
  //   			$('#hs').append(balls);
  //   		}
  //   		//bal count
  //   		// console.log(a);

  //   		if ($('select.sel').val() == 'wd' || $('select.sel').val() == 'nb' || $('select.sel').val() == 'lb' || $('select.sel').val() == 'b')
  //   		{
  //   			ex_check=1;
  //   			if ($('select.sel').val() == 'lb' ||$('select.sel').val() == 'b') 
  //   			{
  //   				a++;
  //                   if(+a == 6)
  //                   {
  //                       t_runs = +t_runs + +runs;
  //                       console.log($('#hs').html());
  //                   //Likhnay wala kaam Ch
  //                       // $('#perover h3').append('End of Over '+ over +': '+$('#hs').html()+'<br> Runs Scored: '+ runs +'<br>');
  //                   //Likhnay wala kaam Ch
  //                       // $('#perover h4').html('Total Score: '+ t_runs + '/'+ wkt_cnt);
  //                   $('#hs').append('<strong style="color:green;">|</strong>');
  //                   a=0;
  //                   runs=0;
  //                   over++;
  //                   $('#overNo').html('');
  //                   //Likhnay wala kaam
  //                   $('#overNo').append(over);
  //               }
  //                   // break;
  //   			}
  //   			if ($('select.sel').val() == 'wd' || $('select.sel').val() == 'lb' || $('select.sel').val() == 'b')
  //   			{
  //   				// $('select.exSel option:first').attr('disabled', true);
  //   				$('select.exSel option:nth-child(2)').attr('disabled', true);
  //   				// $("p:nth-child(3)")
  //   			}
  //   			//what happens on balls
  //   			// console.log($('select').val());
  //   			console.log('IlLegal');
  //   			$('select.sel').prop('disabled',true);
  //   			$('#extra').removeClass('hidden');
  //   		}
  //   		else if ($('select.sel').val() == 'w')
  //   		{
  //               a++;
  //   			wkt_cnt++;
  //   			$('select.sel').prop('disabled',true);
  //   			$('#wicket').removeClass('hidden');
    			
  //               if(+a == 6)
  //               {
  //                   t_runs = +t_runs + +runs;
  //                   console.log($('#hs').html());
  //                   //Likhnay wala kaam Ch
  //                       // $('#perover h3').append('End of Over '+ over +': '+$('#hs').html()+'<br> Runs Scored: '+ runs +'<br>');
  //                   //Likhnay wala kaam Ch
  //                       // $('#perover h4').html('Total Score: '+ t_runs + '/'+ wkt_cnt);
  //                   $('#hs').append('<strong style="color:green;">|</strong>');
  //                   a=0;
  //                   runs=0;
  //                   over++;
  //                   $('#overNo').html('');
  //                   //Likhnay wala kaam
  //                   $('#overNo').append(over);
  //               }
  //   		}
  //   		else
  //   		{
  //   			//what happens on balls
  //   			// console.log($('select').val());
  //   			console.log('Legal');
  //   			console.log('a is inc')
  //   			a++;
    			
  //   		}
  //   		$("option:selected").prop("selected", false)
  //   	});
    </script>
	@stop