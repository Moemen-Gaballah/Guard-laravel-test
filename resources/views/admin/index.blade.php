<h2>admins</h2>

<p>Name: {{Auth::guard('admin')->user()->name}}</p>
@foreach($admins as $admin)
	<p>Username: {{$admin->name}} || Email: {{$admin->email}}</p>	
@endforeach

