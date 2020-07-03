@extends('website/layout')
@section('css')
<link href="{{asset('css/style.css') }}" rel="stylesheet">

@endsection
@section('content')
<div class="container">
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="{{ asset('website/signin-image.jpg') }}" alt="sing up image"></figure>
                    <a href="/register" class="signup-image-link">Maak anders een account aan!</a>
                </div>
    
                <div class="signin-form">
                    <h2 class="form-title">Login in</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">

                            
                  

                            <div class="form-group">
                           
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="your_name" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="form-group">

                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" id="your_pass"
                                    required autocomplete="current-password" placeholder="Wachtwoord">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember_me"
                                    class="agree-term"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Onthoud me') }}
                                    </label>
                                </div>
                        </div>

                        <div class="form-group form-button">
                           
                                <input type="submit" name="login" id="signin" class="form-submit" value="Log in"/>


                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            
                        </div>
                    </form>
                   
                </div>
            </div>
        </div>
    </section>
@endsection
