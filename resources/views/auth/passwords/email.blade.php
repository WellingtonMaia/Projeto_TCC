@extends('layouts.app')
@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form"  method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}
                <span class="login100-form-title p-b-48">
                    <img src="{{ asset('img/logo.png')}}">
                    {{-- <br>
                    Reset Password --}}
                </span>
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                <div class="wrap-input100 validate-input {{ $errors->has('email') ? ' has-error' : '' }}" data-validate = "Valid email is: a@b.c">
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                    <input class="input100" type="text" name="email">
                    <span class="focus-input100" data-placeholder="Email"></span>
                </div>
                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn">
                        Send Password Reset Link
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{{--
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection