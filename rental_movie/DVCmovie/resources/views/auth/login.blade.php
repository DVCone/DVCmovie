@extends('layout.default')

@section('content')

<div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Login Today</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('auth.auth') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">E-Mail Address</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Your Email" required autofocus>
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control" name="password" placeholder="Your Password" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-5 ml-auto">
            <div class="card">
                <div class="card-header">SignUp Today</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('auth.auth') }}">
                        {{ csrf_field() }}
                        
                        <div class="form-group">
                            <label for="name">User Name</label>
                            <input id="name" type="text" class="form-control form-control-sm" name="name" value="{{ old('name') }}" placeholder="Your User Name" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="email">E-Mail Address</label>
                            <input id="email" type="email" class="form-control form-control-sm" name="email" value="{{ old('email') }}" placeholder="Your Email" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control form-control-sm" name="password" placeholder="New Password" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Confirm Password</label>
                            <input id="password" type="password" class="form-control form-control-sm" name="password" placeholder="Re-Enter New Password" required>
                            
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Sign Up</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<footer style="background-color:#9B1D20; padding: 20px 0; position: absolute; bottom:0; right:0; left:0;" class="text-center">
    <span class="text-white small">@2017. All Rights Reserved</span>
</footer>
@endsection
