@extends('main.layout')

@section('title', ' - Dashboard')

@section('nav')
	@include('user.nav')
@endsection

@section('content')
<section class="home">
	<div class="stat main-stat">
		<div class="metric">{{$user->quit->getDays()}} Days</div>
		<div class="description">Without Smoking A Cigarette</div>
	</div>
	<div class="stat">
		<div class="metric">${{$user->quit->getMoney()}}</div>
		<div class="description">Money Saved</div>
	</div>
	<div class="stat">
		<div class="metric">{{$user->quit->getMinutes()}}</div>
		<div class="description">Minutes Saved</div>
	</div>
	<div class="stat">
		<div class="metric">{{$user->quit->getCigarettes()}} Cigarettes</div>
		<div class="description">Not Smoked</div>
	</div>
</section>
<section class="updates">

	{{-- Flash Messages --}}
	@include('partials.flash')

	{{-- Milestones --}}
	@include('partials.milestones')
	
</section>

@endsection