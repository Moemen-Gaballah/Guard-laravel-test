<h2>users</h2>
User: {{Auth::user()->name}}

@foreach($users as $user)
	<p>Username: {{$user->name}} || Email: {{$user->email}}</p>	
@endforeach

