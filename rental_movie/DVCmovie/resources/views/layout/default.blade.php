<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <title>@yield('tittle')</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container-fluid">
    @if(Auth::check())
      <a class="navbar-brand" href="{{ route('index') }}">{{ Auth::user()->name }}</a>
    @else
    <a class="navbar-brand" href="{{ route('index') }}">DVCmovie</a>

    @endif
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample07">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mr-3">
            @if(Auth::check())
            <a class="nav-link" href="{{ route('auth.destroy') }}">Log Out</a>
            @else
            <a class="nav-link" href="{{ route('auth.login') }}">Log In</a>
            @endif
          </li>
        </ul>
      </div>
      <div class="form-inline my-2 my-lg-0">
        <form action="{{ route('movies.search') }}" method="get">
          <input name="keyword" class="form-control mr-2" type="text" placeholder="Search" aria-label="Search">
        </form>
      </div>
    </div>
  </nav>
  <div id="movie">
    @yield('content')
  </div>
  




  <script src="/js/popper.min.js"></script>
  <script src="/js/jquery-3.2.1.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
</body>

</html>