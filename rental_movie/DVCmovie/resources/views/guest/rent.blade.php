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
    <a class="text-light" href="{{ route('guest.home') }}" style="text-decoration:none;">
    <h4 class="text-primary mr-auto ">Rent List</h4>
    </a>
  </div>

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Judul</th>
      <th scope="col">Category</th>
      <th scope="col">Year</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <tr>
    <td>{{ $movies->id }}</td>
    <td>{{ $movies->title }}</td>
    <td>{{ $movies->moviecategory->name }}</td>
    <td>{{ $movies->year }}</td>
    <td>
      <form method="POST" action="">
        <input type="hidden" name="_method" value="delete" /> {{ csrf_field() }}
        <button type="submit" onclick="" class="btn btn-danger">
          Batal
        </button>
      </form>
    </td>
  </tr>
</tbody>
</table>


</div>


@stop