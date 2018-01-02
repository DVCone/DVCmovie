@extends('layout.default') @section('tittle', 'admin') @section('content') @if( Session::get('success_message'))
<div class="container">
  <div class="alert alert-block alert-info">
    {{ Session::get('success_message') }}
  </div>
</div>
@endif
<div class="container">
  <div class="row p-3">
    <a class="text-light" href="{{ route('admin.home') }}" style="text-decoration:none;">
      <h4 class="text-primary mr-auto ">Data Film</h4>
    </a>

    <a class="text-light ml-auto" href="{{ route('movies.create') }}">
      <button type="button" class="btn btn-danger ">Add Movie</button>
    </a>

  </div>

  <table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Poster</th>
        <th scope="col">Title</th>
        <th scope="col">Category</th>
        <th scope="col">Reliase</th>
        <th scope="col">Actor</th>
        <th scope="col">Description</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($movies as $movie)
      <tr>
        <td>{{ $movie->id }}</td>
        <td>
          @if($movie->photo)
          <img src="{{ $movies->photo }}" width="100" height="100"> @else
          <img src="/photos/no-avatar.png" width="100" height="100"> @endif
        </td>
        <td>{{ $movie->title }}</td>
        <td>{{ $movie->moviecategory->name }}</td>
        <td>{{ $movie->year }}</td>
        <td>{{ $movie->actor }}</td>
        <td>{{ $movie->description }}</td>
        <td>
          <form method="POST" action="{{ route('movies.destroy', $movie->id) }}">
            <input type="hidden" name="_method" value="delete" /> {{ csrf_field() }}
            <button type="submit" onclick="return confirm('Hapus {{ $movie->title }} ?')" class="btn btn-danger">
              Delete
            </button>
          </form>
          <form method="POST" action="">
            <input type="hidden" name="_method" value="delete" /> {{ csrf_field() }}
            <button type="submit" onclick="return confirm('Hapus {{ $movie->title }} ?')" class="mt-2 btn btn-danger" style="padding-right: 23px;
            padding-left: 20px;">
              Edit
            </button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <nav aria-label="Page">
    @if ($movies->lastPage() > 1)
    <ul class="pagination justify-content-center">
      <li class="page-item">
        <a class="page-link" href="{{ $movies->previousPageUrl() }}" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      @for ($i = 1; $i<= $movies ->lastPage(); $i++)
        <li class="page-item">
          <a class="page-link" href="{{ $movies->url($i) }}">{{ $i }}</a>
        </li>
        @endfor
        <li class="page-item">
          <a class="page-link" href="{{ $movies->nextPageUrl() }}" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
    </ul>
    @endif
  </nav>
</div>

<footer style="background-color:#9B1D20; padding: 20px 0; position: relative; right: 0; left: 0;" class="text-center">
  <span class="text-white small">@2017. All Rights Reserved</span>
</footer>
@stop