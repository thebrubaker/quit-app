@extends('main.layout')

@section('title', ' - Dashboard')

@section('nav')
	@extends('partials.nav')
		@section('nav-brand')
			<a href="{{url('/')}}">Rescue Quit App</a>
		@endsection
		@section('nav-icon')
			<a href="{{url('quit')}}" class="navbar-right"><i class="material-icons">settings</i></a>
		@endsection
@endsection

@section('content')
<section class="home">
	<div class="stat main-stat">
		<div class="metric">{{$user->quit->daysQuit()}} Days</div>
		<div class="description">Without Smoking A Cigarette</div>
	</div>
	<div class="stat">
		<div class="metric">${{$user->quit->moneySaved()}}</div>
		<div class="description">Money Saved</div>
	</div>
	<div class="stat">
		<div class="metric">{{$user->quit->timeSaved()}}</div>
		<div class="description">Time Saved</div>
	</div>
	<div class="stat">
		<div class="metric">{{$user->quit->notSmoked()}} Cigarettes</div>
		<div class="description">Not Inhaled By Your Lungs</div>
	</div>
</section>

{{-- <ul>
	<li class="progress-item">Days without smoking: <span class="progress-metric">{{$user->quit->daysQuit()}}</span></li>
	<li class="progress-item">Money saved: <span class="progress-metric">${{$user->quit->moneySaved()}}</span></li>
	<li class="progress-item">Time saved: <span class="progress-metric">{{$user->quit->timeSaved()}}</span></li>
	<li class="progress-item">Cigarettes not smoked: <span class="progress-metric">{{$user->quit->notSmoked()}}</span></li>
</ul> --}}
@endsection