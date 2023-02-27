@extends('layouts.app')

@section('content')
<style>
#delete-user-form{
    display:inline;
    vertical-align:top;
    text-align:center;
}
</style>

<div class="container">
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="javascript:void(0);"></a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('users') }}">View All users</a></li>
            <li><a href="{{ URL::to('register') }}">Create a user</a>
        </ul>
    </nav>
    
    <h1>All the users</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered user_datatable">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Mobile Number</td>
            <td>Verify</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
</div>

<script type="text/javascript">
  $(function () {
    var table = $('.user_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('users.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'mobile_number', name: 'mobile_number'},
            {data: 'email_verified_at', name: 'email_verified_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });
</script>

@endsection