@extends('layouts.admin')


@section('title')
    Club Records and Stats
@stop

@section('header')
    {{ $club }} Records and Stats
@stop

    @section('content')
        @if($stats->count() > 0)
        	<div class="col-md-12">
        		<div class="col-md-4">
        			<h2>Matches: {{ $stats->matches }}</h2>
        		</div>
        		<div class="col-md-4">
        			<h2>Win: {{ $stats->win }}</h2>
        		</div>
        		<div class="col-md-4">
        			<h2>Loss: {{ $stats->loss }}</h2>
        		</div>
        	</div>
        	<br><br><br><br>
        	<div class="col-md-12">
        		<div class="col-md-4">
        			<h2>Ranking Points: {{ $stats->points }}</h2>
        		</div>
        		<div class="col-md-4">
        			<h2>Highest Score: @if($hs){{ $hs->runs }} /{{ $hs->wickets }}@endif</h2>
        		</div>
        		<div class="col-md-4">
        			<h2>Lowest Score:  @if($ls)  {{ $ls->runs }} /{{ $ls->wickets }}@endif</h2>
        		</div>
        	</div>
        	<br><br><br>
        	<div class="col-md-12">
        		<div class="col-md-12">
        			<h2>Last Five Matches</h2>
        			<h3>
        				<ul>
        					@foreach($matches as $match)
        						<li>
        							@if($id == $match->winner_club_id)
        							<span class="label-sm label-success">
    	    							{{ $match->club1->name }} vs {{ $match->club2->name }}
    	    							Result: {{ $match->result }}
        							</span>
        							@else
        							<span class="label-sm label-danger">
        								{{ $match->club1->name }} vs {{ $match->club2->name }}
        								Result: {{ $match->result }}</span>
        							@endif
        						</li>
        					@endforeach
        				</ul>
        			</h3>
        		</div>
        	</div>
        @endif
    @stop