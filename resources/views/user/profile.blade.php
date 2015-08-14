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
		<img src="/images/joel.jpg" alt="" class="profile-thumb">
		<a href="#" class="update-link">
			<span class="update">
				<span class="bold">Adam Brohannon</span> didn't smoke <span class="bold">500 cigarettes.</span>
			</span>
			<span class="timestamp">25 Minutes Ago</span>
		</a>
		<div class="actions">
			<a href="#" class="gif-icon"><i class="material-icons">gif</i></a>
			<a href="#" class="smile-icon"><i class="material-icons">insert_emoticon</i></a>
		</div>
	</div>
	<div class="update-item card">
		<img src="/images/joel.jpg" alt="" class="profile-thumb">
		<a href="#" class="update-link">
			<span class="update">
				<span class="bold">Joel Brubaker</span> hasn't smoked for <span class="bold">40 days.</span>
			</span>
			<span class="timestamp">1 Day Ago</span>
		</a>
		<div class="actions">
			<a href="#" class="gif-icon"><i class="material-icons">gif</i></a>
			<a href="#" class="smile-icon"><i class="material-icons">insert_emoticon</i></a>
		</div>
	</div>
	<div class="update-item card">
		<img src="/images/joel.jpg" alt="" class="profile-thumb">
		<a href="#" class="update-link">
			<span class="update">
				<span class="bold">Bill Murray</span> saved <span class="bold">$750.00.</span>
			</span>
			<span class="timestamp">3 Days Ago</span>
		</a>
		<div class="actions">
			<a href="#" class="gif-icon"><i class="material-icons">gif</i></a>
			<a href="#" class="smile-icon"><i class="material-icons">insert_emoticon</i></a>
		</div>
	</div>
</section>

{{-- <ul>
	<li class="progress-item">Days without smoking: <span class="progress-metric">{{$user->quit->daysQuit()}}</span></li>
	<li class="progress-item">Money saved: <span class="progress-metric">${{$user->quit->moneySaved()}}</span></li>
	<li class="progress-item">Time saved: <span class="progress-metric">{{$user->quit->timeSaved()}}</span></li>
	<li class="progress-item">Cigarettes not smoked: <span class="progress-metric">{{$user->quit->notSmoked()}}</span></li>
</ul> --}}
@endsection