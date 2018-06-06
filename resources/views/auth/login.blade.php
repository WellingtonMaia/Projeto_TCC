@extends('layouts.app')

@section('content')

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form"  method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <span class="login100-form-title p-b-48">                        
                        <img src="{{ asset('img/logo.png')}}">                        
                    </span>
                    <div class="wrap-input100 validate-input {{ $errors->has('email') ? ' has-error' : '' }}" data-validate = "Valid email is: a@b.c">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        <input class="input100" type="text" name="email">
                        <span class="focus-input100" data-placeholder="Email"></span>
                    </div>

                    <div class="wrap-input100 validate-input{{ $errors->has('password') ? ' has-error' : '' }}" data-validate="Enter password">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </div>

                     <div class="text-center p-t-35 ">
                        <a class="btn btn-link txt2" href="{{ route('password.request') }}">Forgot Your Password? </a>
                     </div>
                     

                    <div class="text-center p-t-35">
                        <span class="txt1">
                            Don’t have an account?
                        </span>

                        <a class="txt2" href="{{ route('register') }}">
                            Sign Up
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
