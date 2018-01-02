@extends('layout.default')

@section('tittle') 

@section('content')


<div class="container">
    <h1 class="mr-auto text-primary mt-5">List film</h1>
    <div class="row pt-4">
        @foreach($movies as $movie)
            <div class="col-3 p-2">
            @if($movie->photo)
                <img src="{{ $movie->photo }}"  class="img-thumbnail" alt="Poster Movies">
            @else
                <img src="/photos/no-avatar.png"  class="img-thumbnail" alt="Poster Movies">
            @endif
            </div>
            <div class="col-3 p-2">
                <div class="card-body">
                    <h4 class="card-title">{{ $movie->title }}</h4>
                    <p class="card-text">{{ $movie->movieCategory->name }}</p>
                    <a href="{{ route('movies.detail', $movie->id) }}" class="btn btn-danger">Detail</a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row mt-3">
            @if ($movies->lastPage() > 1)
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="{{ $movies->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                @for ($i = 1; $i <= $movies->lastPage(); $i++)
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
    </div>
</div>


@stop