@extends('layouts.admin')

@section('title')
	Tournament Stats
@stop

@section('header')
	{{ $name }} {{ $edition }} STATS
@stop

@section('content')
	<div class="col-md-12">
		<div class="col-md-6">
			<h2>Total Matches</h2>
			<span style="margin: 15px; font-weight: bold;">{{ $total_matches }}</span>
		</div>
		<div class="col-md-6">
			<h2>Total Runs</h2>
			<span style="margin: 15px; font-weight: bold;">{{ $total_runs }}</span>
		</div>
	</div>
	<div class="col-md-12">
		<div class="col-md-6">
			<h2>Total Sixes</h2>
			<span style="margin: 15px; font-weight: bold;">{{ $total_sixes }}</span>
		</div>
		<div class="col-md-6">
			<h2>Total Fours</h2>
			<span style="margin: 15px; font-weight: bold;">{{ $total_fours }}</span>
		</div>
	</div>
	<div class="col-md-12">
		<div class="col-md-6">
			<h3>Highest First Inning Score</h3>
			<span style="margin: 15px; font-weight: bold;">{{ $max_f_runs }}</span>
		</div>
		<div class="col-md-6">
			<h3>Lowest First Inning Score</h3>
			<span style="margin: 15px; font-weight: bold;">{{ $min_f_runs }}</span>
		</div>
	</div>
	<div class="col-md-12">
		<div class="col-md-6">
			<h3>Highest Second Inning Score</h3>
			<span style="margin: 15px; font-weight: bold;">{{ $max_s_runs }}</span>
		</div>
		<div class="col-md-6">
			<h3>Lowest Second Inning Score</h3>
			<span style="margin: 15px; font-weight: bold;">{{ $min_s_runs }}</span>
		</div>
	</div>
	<div class="col-md-12">
		<div class="col-md-6">
			<h2>Highest Individual Score</h2>
			<span style="margin: 15px; font-weight: bold;">{{ $highscore }}</span>
		</div>
		<div class="col-md-6">
			<h2>Best Bowling Figure</h2>
			<span style="margin: 15px; font-weight: bold;">{{ $bestball }}</span>
		</div>
	</div>
	<div class="col-md-12">
		<div class="col-md-6">
			<h2>Total Centuries</h2>
			<span style="margin: 15px; font-weight: bold;">{{ $centuries }}</span>
		</div>
		<div class="col-md-6">
			<h2>Total Half Centuries</h2>
			<span style="margin: 15px; font-weight: bold;">{{ $halfcenturies }}</span>
		</div>
	</div>
@stop

@section('scripts')
	<script>
		$('h2').css('text-decoration','underline');
		$('h3').css('text-decoration','underline');
	</script>
@stop