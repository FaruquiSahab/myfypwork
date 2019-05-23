@extends('layouts.admin')

@section('title')
    Players Record and Stats
@stop

@section('header')
    {{ $player }} Records and Stats
@stop

@section('content')
	<div class="col-md-12">
		<div class="col-md-3">Matches {{ $stats_t->matches }} </div>
		<div class="col-md-3">Runs {{ $stats_t->runs }} </div>
		<div class="col-md-3">Centuries {{ $stats_t->centuries }} </div>
		<div class="col-md-3">Half Centuries {{ $stats_t->halfcenturies }} </div>
	</div>
	<br><br><br><br>
	<div class="col-md-12">
		<div class="col-md-3">Strike Rate {{ $stats_t->strikerate }} </div>
		<div class="col-md-3">Average {{ $stats_t->average_bat }} </div>
		<div class="col-md-3">Sixes {{ $stats_t->sixes }} </div>
		<div class="col-md-3">Fours {{ $stats_t->fours }} </div>
	</div>
	<br><br><br><br>
	<div class="col-md-12">
		<div class="col-md-12">
			<strong>Last Five Matches</strong>
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Runs</th>
							<th>Balls</th>
							<th>Strike Rate</th>
							<th>Sixes</th>
							<th>Fours</th>
						</tr>
					</thead>
					@if($batsmen->count() > 0)
						<tbody>
						@foreach($batsmen as $key=>$record)
							<tr>
								<th>{{ $key+1 }}</th>
								<th>{{ $record->runs }}</th>
								<th>{{ $record->balls }}</th>
								<th>
									@if($record->balls > 0)
										{{ ($record->runs/$record->balls)*100 }}
									@else
										0
									@endif
								</th>
								<th>{{ $record->sixes }}</th>
								<th>{{ $record->fours }}</th>
							</tr>
						@endforeach
						</tbody>
					@endif
				</table>
		</div>
		<br><br>
	</div>
	<br><br><br><br>	
	@if($role_id == 2 || $role_id == 3)
	<div class="col-md-12">
		<div class="col-md-4">Overs {{ $stats_t->overs }} </div>
		<div class="col-md-4">Runs {{ $stats_t->runs_ball }} </div>
		<div class="col-md-4">Wickets {{ $stats_t->wickets }} </div>
	</div>
	<br><br><br><br>
	<div class="col-md-12">
		<div class="col-md-4">Best Ball {{ $stats_t->best_ball }} </div>
		<div class="col-md-4">Economy {{ $stats_t->economy }} </div>
		<div class="col-md-4">Five Wickets {{ $stats_t->five_wickets }}</div>
	</div>
	<br><br><br><br>
	<div class="col-md-12">
		<div class="col-md-12">
			Last Five Matches
			<table class="table">
				<thead>
					<tr>
						<th>Overs</th>
						<th>Maidens</th>
						<th>Runs</th>
						<th>Wickets</th>
						<th>Economy</th>
					</tr>
				</thead>
				@if($bowler->count() > 0)
					<tbody>
						@foreach($bowler as $record)
							<tr>
								<th>{{ $record->overs }}</th>
								<th>{{ $record->maidens }}</th>
								<th>{{ $record->runs }}</th>
								<th>{{ $record->wickets }}</th>
								@if($record->overs > 0)
								<th>{{ $record->runs/$record->overs }}</th>
								@else
									0
								@endif
							</tr>
						@endforeach
					</tbody>
				@endif
			</table>
		</div>
	</div>
	@endif
@stop