@extends('layouts.admin')

@section('title')
	Tournament Stats
@stop

@section('header')
	{{ $name }} {{ $edition }} STATS
@stop

@section('content')

<div class="form-group">

		<div class="col-lg-12">

			<div class="col-lg-6">
				<div class="panel panel-success">
					<div class="panel-heading text-center">
						Matches
					</div>
					<div class="panel-body text-center">

						<br>
						<br>
						<strong style="font-size: 50px;">{{ $total_matches }}</strong>
					</div>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="panel panel-danger">

					<div class="panel-heading text-center">
						Runs
					</div>
					<div class="panel-body text-center">

						<br>
						<br>
						<strong style="font-size: 50px;">{{ $total_runs }}</strong>

					</div>
				</div>
			</div>
		</div>
		
		<div class="col-lg-12">

			<div class="col-lg-6">

				<div class="panel panel-default">

					<div class="panel-heading text-center">
						Sixes
					</div>
					<div class="panel-body text-center">

						<br>
						<br>
						<strong style="font-size: 50px;">{{ $total_sixes }} </strong>

					</div>
				</div>
			</div>

			<div class="col-lg-6">

				<div class="panel panel-warning">

					<div class="panel-heading text-center">
						Fours
					</div>
					<div class="panel-body text-center">

						<br>
						<br>
						<strong style="font-size: 50px;">{{ $total_fours }}</strong>

					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-12">

			<div class="col-lg-6">
				<div class="panel panel-success">
					<div class="panel-heading text-center">
						Highest Score 1st Innings
					</div>
					<div class="panel-body text-center">

						<br>
						<br>
						<strong style="font-size: 50px;">{{ $max_f_runs }}</strong>
					</div>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="panel panel-danger">

					<div class="panel-heading text-center">
						Lowest Score 1st Innings
					</div>
					<div class="panel-body text-center">

						<br>
						<br>
						<strong style="font-size: 50px;">{{ $min_f_runs }}</strong>

					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-12">

			<div class="col-lg-6">

				<div class="panel panel-default">

					<div class="panel-heading text-center">
						Highest Score 2nd Innings
					</div>
					<div class="panel-body text-center">

						<br>
						<br>
						<strong style="font-size: 50px;">{{ $max_s_runs }} </strong>

					</div>
				</div>
			</div>

			<div class="col-lg-6">

				<div class="panel panel-warning">

					<div class="panel-heading text-center">
						Lowest Score 2nd Innings
					</div>
					<div class="panel-body text-center">

						<br>
						<br>
						<strong style="font-size: 50px;">{{ $min_s_runs }}</strong>

					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-12">

			<div class="col-lg-6">
				<div class="panel panel-success">
					<div class="panel-heading text-center">
						Highest Individual Score
					</div>
					<div class="panel-body text-center">

						<br>
						<br>
						<strong style="font-size: 50px;">{{ $highscore }}</strong>
					</div>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="panel panel-danger">

					<div class="panel-heading text-center">
						Best Bowling Figure
					</div>
					<div class="panel-body text-center">

						<br>
						<br>
						<strong style="font-size: 50px;">{{ $bestball }}</strong>

					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-12">

			<div class="col-lg-6">

				<div class="panel panel-default">

					<div class="panel-heading text-center">
						Centuries
					</div>
					<div class="panel-body text-center">

						<br>
						<br>
						<strong style="font-size: 50px;">{{ $centuries }} </strong>

					</div>
				</div>
			</div>

			<div class="col-lg-6">

				<div class="panel panel-warning">

					<div class="panel-heading text-center">
						Half Centuries
					</div>
					<div class="panel-body text-center">

						<br>
						<br>
						<strong style="font-size: 50px;">{{ $halfcenturies }}</strong>

					</div>
				</div>
			</div>
		</div>



	</div>

@stop

@section('scripts')
	<script>
		$('h2').css('text-decoration','underline');
		$('h3').css('text-decoration','underline');
	</script>
@stop