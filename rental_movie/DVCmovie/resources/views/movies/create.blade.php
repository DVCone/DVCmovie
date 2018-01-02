@extends('layout.default')

@section('title', 'tambah film') 

@section('content')

<div class="container mb-5">
  <div class="row-6">
    
      <h1 class="mt-5 mb-3">
        <a class="text-danger" href="{{ route('admin.admin') }}" style="text-decoration:none;">Add New Movie</a>
      </h1>
      
    <form method="POST" enctype="multipart/form-data" action="{{ route('movies.store') }}">
      {{ csrf_field() }}
      <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control" placeholder="Movie Title"> @if($errors->first('title'))
        <p style="color:red"> {{ $errors->first('title')}} </p>
        @endif

      </div>

      <div class="form-group">
        <label for="inputState">Category</label>
        <select id="inputState" class="form-control" name="category_id" id="category_id">
          <option selected>Choose...</option>

          @foreach($category as $categori)
          <option value="{{ $categori->id }}">{{ $categori->name }}</option>
          @endforeach

        </select>
      </div>

      <div class="form-group">
        <label for="inputAddress">Year</label>
        <input type="text" name="year" class="form-control" id="inputAddress" placeholder="Year Release"> @if($errors->first('year'))
        <p style="color:red"> {{ $errors->first('year')}} </p>
        @endif
      </div>

      <div class="form-group">
        <label>Actor</label>
        <input type="text" name="actor" class="form-control" placeholder="Name Of Actor"> @if($errors->first('actor'))
        <p style="color:red"> {{ $errors->first('actor')}} </p>
        @endif
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Description </label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" placeholder="Description . . ."></textarea>

        @if($errors->first('description'))
        <p style="color:red"> {{ $errors->first('description')}} </p>
        @endif
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Photo </label> <br>
        <input type="file" name="photo" placeholder="Insert The Poster Image"> 
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

<footer style="background-color:#9B1D20; padding: 20px 0; position: relative; bottom: 0; right: 0; left: 0;" class="text-center">
    <span class="text-white small">@2017. All Rights Reserved</span>
</footer>
@stop