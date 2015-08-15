@extends('main.layout')

@section('title', ' - Dashboard')

@section('nav')
	@include('user.nav')
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
		<div class="description">Not Smoked</div>
	</div>
</section>
<section class="updates">
	<div class="update-item card">
		<div class="status">
			<a href="#" class="milestone">
				<span class="bold">Adam Brohannon</span> hasn't smoked <span class="bold">500 cigarettes.</span>
			</a>
			<a href="#" class="timestamp">25 Minutes Ago</a>
		</div>
		<div class="actions">
			<a href="#" class="gif-icon"><i class="material-icons">gif</i></a>
			<a href="#" class="smile-icon"><i class="material-icons">insert_emoticon</i></a>
		</div>
	</div>
	<div class="update-item card">
		<div class="status">
			<a href="#" class="milestone">
				<span class="bold">Adam Brohannon</span> saved <span class="bold">$740.00</span> from not smoking.
			</a>
			<a href="#" class="timestamp">25 Minutes Ago</a>
		</div>
		<div class="actions">
			<a href="#" class="gif-icon"><i class="material-icons">gif</i></a>
			<a href="#" class="smile-icon"><i class="material-icons">insert_emoticon</i></a>
		</div>
	</div>
	<div class="update-item card">
		<div class="status">
			<a href="#" class="milestone">
				<span class="bold">Adam Brohannon</span> went <span class="bold">36 days</span> without smoking a cigarette.
			</a>
			<a href="#" class="timestamp">25 Minutes Ago</a>
		</div>
		<div class="actions">
			<a href="#" class="gif-icon"><i class="material-icons">gif</i></a>
			<a href="#" class="smile-icon"><i class="material-icons">insert_emoticon</i></a>
		</div>
	</div>
	<div class="update-item card">
		<div class="status">
			<a href="#" class="milestone">
				<span class="bold">Adam Brohannon</span> has saved <span class="bold">2 days</span> of time not smoking.
			</a>
			<a href="#" class="timestamp">25 Minutes Ago</a>
		</div>
		<div class="actions">
			<a href="#" class="gif-icon"><i class="material-icons">gif</i></a>
			<a href="#" class="smile-icon"><i class="material-icons">insert_emoticon</i></a>
		</div>
	</div>
</section>

@endsection