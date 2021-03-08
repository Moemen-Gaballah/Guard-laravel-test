<h1>page for admin to Login</h1>
<form method="post" action="{{route('admin.login')}}">
	@csrf
Email: <input type="text" name="email"><br>
Password: <input type="password" name="password"><br>
Submit: <input type="submit" name="submit"><br>
</form>


@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif