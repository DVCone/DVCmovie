@extends('layout.default') 

@section('tittle', 'movie') 

@section('content')

<div class="container">
    <h1 class="mr-auto text-primary mt-5">List film</h1>
    <div class="row pt-4">
        @foreach($movies as $movie)
        <div class="col-3 p-2">
            @if($movie->photo)
            <img src="{{ $movie->photo }}" class="img-thumbnail" alt="Poster Movies"> @else
            <img src="/photos/no-avatar.png" class="img-thumbnail" alt="Poster Movies"> @endif
        </div>
        <div class="col-3 p-2">
            <div class="card-body">
                <h4 class="card-title">{{ $movie->title }}</h4>
                <p class="card-text">{{ $movie->movieCategory->name }}</p>
                <a href="{{ route('movies.detail', $movie->id) }}" class="btn btn-danger">Detail</a>
            </div>
        </div>
        <br>
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

<footer style="background-color:#9B1D20; padding: 20px 0; position: relative; right: 0; left: 0;" class="text-center">
    <span class="text-white small">@2017. All Rights Reserved</span>
</footer>
@stop