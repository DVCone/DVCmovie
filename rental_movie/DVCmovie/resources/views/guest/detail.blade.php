@extends('layout.default')

@section('tittle', 'Detail Movie')

@section('content')

<div class="container p-0">
    <div class="row mt-5 bg-light">
        <div class="media p-3">
            <div class="col-5">
            @if($movies->photo)
                <img src="{{ $movies->photo }}" class="img-thumbnail mr-3" alt="gambar baru">
            @else
                <img class="img-thumbnail mr-3" src="/photos/no-avatar.png" alt="Generic placeholder image">
            @endif
            </div>

            <div class="media-body">
                <h2 class="mt-0">{{ $movies->title }}</h2>

                <table class="table mt-4">
                    <tr>
                        <td>Category</td>
                        <td>{{ $movies->movieCategory->name }}</td>
                    </tr>
                    <tr>
                        <td>Actor</td>
                        <td>{{ $movies->actor }}</td>
                    </tr>
                    <tr>
                        <td>Rilis</td>
                        <td>{{ $movies->year }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>Description</p>
                            <p>{{ $movies->description }}</p>
                        </td>
                    </tr>
                </table>

                <div class="mt-4">
                <form action="{{ route('guest.rent') }}" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" name="user_id" value= "{{Auth::user()->id}}">
                    <input type="hidden" name="movie_id" value="{{ $movies->id }}">       
                    <button type="submit">Rent</button>         
                </form>
                    <!-- <a href="{{ route('guest.rent', $movies->id) }}" class="btn btn-warning ">Rent</a> -->
                    <!-- <a href="#" class="btn btn-danger ">Watch</a> -->
                    
                </div>
            </div>

        </div>
    </div>
</div>

<footer style="background-color:#9B1D20; padding: 20px 0; position: absolute; bottom: 0; right: 0; left: 0;" class="text-center">
    <span class="text-white small">@2017. All Rights Reserved</span>
</footer>
@stop