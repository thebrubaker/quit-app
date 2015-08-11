@extends('main.layout')

@section('title', ' - Dashboard')

@section('nav')
	@extends('partials.nav')
	@section('nav-brand')
		<a href="{{url('/')}}">Rescue Quit App</a>
	@stop
	@section('nav-icon')
		<a href="{{url('quit')}}" class="navbar-right"><i class="material-icons">settings</i></a>
	@stop
@stop

@section('content')
<div class="profile">
	<div class="container">
		<section class="card">
			<div class="header">
				<h1>PROGRESS</h1>
			</div>
			<div class="container">
				<ul>
					<li class="progress-item">Days without smoking: <span class="progress-metric">{{$user->quit->daysQuit()}}</span></li>
					<li class="progress-item">Money saved: <span class="progress-metric">${{$user->quit->moneySaved()}}</span></li>
					<li class="progress-item">Time saved: <span class="progress-metric">{{$user->quit->timeSaved()}}</span></li>
					<li class="progress-item">Cigarettes not smoked: <span class="progress-metric">{{$user->quit->notSmoked()}}</span></li>
				</ul>
			</div>
		</section>
		<section class="card">
			<div class="header">
				<h1>ACHIEVEMENTS</h1>
			</div>
			<div class="container">
				<ul>
					<li class="achievement-item"></li>
					<li class="achievement-item"></li>
					<li class="achievement-item"></li>
					<li class="achievement-item"></li>
				</ul>
			</div>
		</section>
		<section class="card">
			<div class="header">
				<h1>COMMUNITY</h1>
			</div>
			<div class="container">
				<ul>
					<li class="achievement-item"></li>
					<li class="achievement-item"></li>
					<li class="achievement-item"></li>
					<li class="achievement-item"></li>
				</ul>
			</div>
		</section>
	</div>
</div>
@stop