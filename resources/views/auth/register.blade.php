@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
 
        <div class="col-md-8 col-md-offset-2">
            
                <div style="font-size:16px;" class="panel-heading">Register</div>
                <div class="panel-body">
                    @include("partials.errors")
                    @if(Session::has('alert'))
<div style="font-size:16px;" class="alert alert-success">
    {{ Session::get('alert') }}
    @php
    Session::forget('alert');
    @endphp
</div>
@endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label style="font-size:16px;" placeholder="First" for="name" class="col-md-4 control-label">Full Name</label>

                            <div class="col-md-6">
                                <input style="font-size:16px;" placeholder="Libert Fiblet" id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label style="font-size:16px;" for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input style="font-size:16px;"placeholder="homesupermarket@info.com"  id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label style="font-size:16px;" for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input style="font-size:16px;" id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label style="font-size:16px;" for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input style="font-size:16px;" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label style="font-size:16px;" for="phone" class="col-md-4 control-label">Phone</label>
                            <div class="col-md-6">
                            <input id="phone" style="font-size:16px;" type="text" placeholder="+255 789 098098" class="form-control" name="phone" required>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" style="font-size:16px;"  class="btn btn-lg btn-success">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        
    </div>
</div>
@endsection
