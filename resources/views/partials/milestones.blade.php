@if (Session::has('milestones.newly_created'))
	@foreach(Session::get('milestones.newly_created') as $milestone)
		<div class="card milestone new-milestone">
			<div class="status">
				<a href="{{url('profile/' . $milestone->user->id)}}" class="update">
					@if($milestone->type == 'days')
					<span class="bold">{{$milestone->user->name}}</span> hasn't smoked for <span class="bold">{{$milestone->getDays()}} days.</span>
					@elseif($milestone->type == 'money')
					<span class="bold">{{$milestone->user->name}}</span> has saved <span class="bold">${{$milestone->getMoney()}}</span>
					@elseif($milestone->type == 'minutes')
					<span class="bold">{{$milestone->user->name}}</span> saved over <span class="bold">{{$milestone->getMinutes()}} minutes</span> not smoking.
					@elseif($milestone->type == 'cigarettes')
					<span class="bold">{{$milestone->user->name}}</span> didn't smoke <span class="bold">{{$milestone->getCigarettes()}} cigarettes.</span>
					@endif
				</a>
				<a href="{{url('profile/' . $milestone->user->id)}}" class="timestamp">{{$milestone->time()}}</a>
			</div>
			<div class="actions">
				<a href="#" class="gif-icon"><i class="material-icons">gif</i></a>
				<a href="#" class="smile-icon"><i class="material-icons">insert_emoticon</i></a>
			</div>
		</div>
	@endforeach
@endif

@if ($milestones)
	@foreach($milestones as $milestone)
		<div class="card milestone">
			<div class="status">
				<a href="{{url('profile/' . $milestone->user->id)}}" class="update">
					@if($milestone->type == 'days')
					<span class="bold">{{$milestone->user->name}}</span> hasn't smoked for <span class="bold">{{$milestone->getDays()}} days.</span>
					@elseif($milestone->type == 'money')
					<span class="bold">{{$milestone->user->name}}</span> has saved <span class="bold">${{$milestone->getMoney()}}</span>
					@elseif($milestone->type == 'minutes')
					<span class="bold">{{$milestone->user->name}}</span> saved over <span class="bold">{{$milestone->getMinutes()}} minutes</span> not smoking.
					@elseif($milestone->type == 'cigarettes')
					<span class="bold">{{$milestone->user->name}}</span> didn't smoke <span class="bold">{{$milestone->getCigarettes()}} cigarettes.</span>
					@endif
				</a>
				<a href="{{url('profile/' . $milestone->user->id)}}" class="timestamp">{{$milestone->time()}}</a>
			</div>
			<div class="actions">
				<a href="#" class="gif-icon"><i class="material-icons">gif</i></a>
				<a href="#" class="smile-icon"><i class="material-icons">insert_emoticon</i></a>
			</div>
		</div>
	@endforeach
@endif