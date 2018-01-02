@extends('layout.default')

@section('tittle', 'users') 

@section('content')

  @if( Session::get('success_message'))
    <div class="alert alert-block alert-info">
    {{ Session::get('success_message') }}
    </div>
  @endif
<div class="container">
  <div class="row p-3 mt-2">
    <a class="text-light" href="{{ route('admin.home') }}" style="text-decoration:none;">
    <h4 class="text-primary mr-auto ">Users Data</h4>
    </a>
  </div>

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Title</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <td>{{ $user->id }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->role }}</td>
      <td>
        <form method="POST" action="">
          <input type="hidden" name="_method" value="delete" /> {{ csrf_field() }}
          <button type="submit" class="btn btn-danger">
            Delete
          </button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>


</div>

<footer style="background-color:#9B1D20; padding: 20px 0; position: relative; right: 0; left: 0;" class="text-center">
    <span class="text-white small">@2017. All Rights Reserved</span>
</footer>
@stop