<!DOCTYPE html>
<html>
<head>
    <title>Users App</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="javascript:void(0)"></a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('users') }}">View All users</a></li>
        <li><a href="{{ URL::to('register') }}">Create a user</a>
    </ul>
</nav>

<h3>Showing {{ $user->name }}</h3>

    <div class="jumbotron text-center">
        <h3>{{ $user->name }}</h3>
        <p>
            <strong>Email:</strong> {{ $user->email }}<br>
            <strong>Verified:</strong> {{ $user->email_verified_at == null?'Not Verified':"Verified" }}
        </p>
    </div>

</div>
</body>
</html>