@extends('layouts.admin')

@section('title')
    Players Record and Stats
@stop

@section('header')
    {{ $player }} Records and Stats
@stop

@section('content')
	<div class="form-group">

		<div class="col-lg-12">
			<div class="col-lg-3">

				<div class="panel panel-info">

					<div class="panel-heading text-center">
						Matches
					</div>
					<div class="panel-body text-center">

						<br>
						<br>
						<strong style="font-size: 50px;">{{ $stats_t->matches }}</strong>

					</div>
				</div>
			</div>

			<div class="col-lg-3">

				<div class="panel panel-success">

					<div class="panel-heading text-center">
						Runs
					</div>
					<div class="panel-body text-center">

						<br>
						<br>
						<strong style="font-size: 50px;">{{ $stats_t->runs }}</strong>

					</div>
				</div>
			</div>

			<div class="col-lg-3">

				<div class="panel panel-danger">

					<div class="panel-heading text-center">
						Centuries
					</div>
					<div class="panel-body text-center">

						<br>
						<br>
						<strong style="font-size: 50px;">{{ $stats_t->centuries }}</strong>

					</div>
				</div>
			</div>

			<div class="col-lg-3">

				<div class="panel panel-warning">

					<div class="panel-heading text-center">
						Half Centuries
					</div>
					<div class="panel-body text-center">

						<br>
						<br>
						<strong style="font-size: 50px;">{{ $stats_t->halfcenturies }}</strong>

					</div>
				</div>
			</div>
		</div>



		<div class="col-lg-12">
			<div class="col-lg-3">

				<div class="panel panel-default">

					<div class="panel-heading text-center">
						Strike Rate
					</div>
					<div class="panel-body text-center">

						<br>
						<br>
						<strong style="font-size: 50px;">{{$stats_t->strikerate}}</strong>

					</div>
				</div>
			</div>
			<div class="col-lg-3">

				<div class="panel panel-info">

					<div class="panel-heading text-center">
						Average
					</div>
					<div class="panel-body text-center">

						<br>
						<br>
						<strong style="font-size: 50px;">{{ $stats_t->average_bat }}</strong>

					</div>
				</div>
			</div>

			<div class="col-lg-3">

				<div class="panel panel-default">

					<div class="panel-heading text-center">
						Sixes
					</div>
					<div class="panel-body text-center">

						<br>
						<br>
						<strong style="font-size: 50px;">{{ $stats_t->sixes }} </strong>

					</div>
				</div>
			</div>

			<div class="col-lg-3">

				<div class="panel panel-warning">

					<div class="panel-heading text-center">
						Fours
					</div>
					<div class="panel-body text-center">

						<br>
						<br>
						<strong style="font-size: 50px;">{{ $stats_t->fours }}</strong>

					</div>
				</div>
			</div>
		</div>

	</div>


	<br>
	<br>
	<br>
	<br>
	<br>


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
									{{-- number_format((float)$number, 2, '.', '') --}}
									@if($record->balls > 0)
										{{ number_format((float)(($record->runs/$record->balls)*100), 2, '.', '') }}
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



	<div class="form-group">

		<div class="col-lg-12">
			

			<div class="col-lg-4">

				<div class="panel panel-success">

					<div class="panel-heading text-center">
						Overs
					</div>
					<div class="panel-body text-center">

						<br>
						<br>
						<strong style="font-size: 50px;">{{ $stats_t->overs }}</strong>

					</div>
				</div>
			</div>

			<div class="col-lg-4">

				<div class="panel panel-danger">

					<div class="panel-heading text-center">
						Runs
					</div>
					<div class="panel-body text-center">

						<br>
						<br>
						<strong style="font-size: 50px;">{{ $stats_t->runs_ball }}</strong>

					</div>
				</div>
			</div>

			<div class="col-lg-4">

				<div class="panel panel-warning">

					<div class="panel-heading text-center">
						Wickets
					</div>
					<div class="panel-body text-center">

						<br>
						<br>
						<strong style="font-size: 50px;">{{ $stats_t->wickets }}</strong>

					</div>
				</div>
			</div>
		</div>



		<div class="col-lg-12">
			
			<div class="col-lg-4">

				<div class="panel panel-info">

					<div class="panel-heading text-center">
						Best Ball
					</div>
					<div class="panel-body text-center">

						<br>
						<br>
						<strong style="font-size: 50px;">{{ $stats_t->best_ball }}</strong>

					</div>
				</div>
			</div>

			<div class="col-lg-4">

				<div class="panel panel-default">

					<div class="panel-heading text-center">
						Economy
					</div>
					<div class="panel-body text-center">

						<br>
						<br>
						<strong style="font-size: 50px;">{{ $stats_t->economy }} </strong>

					</div>
				</div>
			</div>

			<div class="col-lg-4">

				<div class="panel panel-warning">

					<div class="panel-heading text-center">
						5 Wickets
					</div>
					<div class="panel-body text-center">

						<br>
						<br>
						<strong style="font-size: 50px;">{{ $stats_t->five_wickets }}</strong>

					</div>
				</div>
			</div>
		</div>

	</div>



	
	<br><br><br><br>
	<div class="col-md-12">
		<div class="col-md-12">
			<strong>Last Five Matches</strong>
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
								<th>
									{{ number_format((float)($record->runs/$record->overs), 2, '.', '') }}
								</th>
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