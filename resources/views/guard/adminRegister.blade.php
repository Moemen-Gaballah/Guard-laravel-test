<h1>page for admin to Register</h1>
<form method="post" action="{{route('admin.register')}}">
	@csrf
Username: <input type="text" name="name"><br>
Email: <input type="text" name="email"><br>
Password: <input type="password" name="password"><br>
Password confirm: <input type="password" name="password_confirmation"><br>
Submit: <input type="submit" name="submit"><br>
</form>

<!-- errors -->
@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif


<!-- Session Success -->
@if (session('success'))
    <div class="alert alert-success" role="alert">
        <strong>Success:</strong> {{ session('success') }}
    </div>
@endif

<!-- @if (session('error'))
    <div class="alert alert-danger" role="alert">
        <strong>Error:</strong> {{ session('error') }}
    </div>
@endif -->
