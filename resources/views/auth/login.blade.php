@extends('layouts.app')

@section('content')
<div style="height: 500px;" class=" container">
    <div class="row">
   
        <div class="col-md-8 col-md-offset-2">

           
                <div style="font-size:16px;" class="panel-heading">Login</div>

                 @if (session('status'))
                        <div style="font-size:16px;" class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('warning'))
                        <div style="font-size:16px;" class="alert alert-warning">
                            {{ session('warning') }}
                        </div>
                    @endif
                <div class="panel-body">
                    @include("partials.errors")

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
            
                        <div style="font-size:16px;" class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" style="font-size:16px;" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div style="font-size:16px;" class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" style="font-size:16px;" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label style="font-size:16px;">
                                        <input style="font-size:16px;" type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button  type="submit" style="font-size:16px;" class="btn btn-success">
                                    Login
                                </button>

                                <a class="btn  btn-link" style="font-size:16px; color: #008000;" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        
    </div>
</div>
@endsection
