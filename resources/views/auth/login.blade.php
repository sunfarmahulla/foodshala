@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    
        <div class=" card col-md-6">
            
            <form class="text-center border-light p-5" method="POST" action="{{ route('login') }}">
              @csrf
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-primary">Register as Customer</a>
                        <a href="{{ route('registerasrestaurent') }}" class="btn btn-secondary">Register as Restaurant Owner</a>
                    @endif
                    </div>
                </div>
                </br>
                <p class="h4 mb-4">Sign in</p>
                <div class="form-group col-sm-12 ">

                
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
                <div class="form-group col-sm-12">
                
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>
                <p>Not a member?
                    <a href="">Register</a>
                </p>
                
            </form>
                        
        </div>

        <div class="col-sm-6">
            <img class="img-responsive" src="{{asset('images/restaurant2.jpg')}}" width="100%"  alt>
        
        </div>
    </div>
</div>


@endsection
