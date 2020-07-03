@extends('website/layout')
@section('css')
<link href="{{asset('css/style.css') }}" rel="stylesheet">

@endsection
@section('content')
<section class="signup">
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Sign up</h2>
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group ">
                            <label for="name"></label>
                                <input id="name" type="text" placeholder="Je Naam" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group ">
                            <label for="email"></label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Je Schoolmail">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group ">
                            <label for="password"></label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Je Wachtwoord">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group ">
                            <label for="password-confirm"></label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Herhaal je wachtwoord">
                        </div>

                        <div class="form-group ">
                            <label for="studentnummer" ></label>

                                <input id="studentnummer" type="text" class="form-control" name="studentnummer" required placeholder="Je Studentnummer">
                                @error('studenummer')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                        </div>
                        <div class="form-group ">
                            <label for="klas"></label>
                            <input id="klas" type="text" class="form-control" name="klas" required placeholder="Je klas">
                            @error('klas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                           @enderror
                        </div>
                        @if($errors->any())
                        <div class="row collapse">
                            <ul class="alert-box warning radius">
                                @foreach($errors->all() as $error)
                                    <li> {{ $error }} </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="form-group form-button">
                            
                                <button type="submit" id="signup" class="form-submit">
                                    {{ __('Maak account aan') }}
                                </button>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="{{ asset('website/signup-image.jpg') }}" alt="sing up image"></figure>
                    <a href="/login" class="signup-image-link">Ik heb al een account !</a>
                </div>
            </div>
        </div>
    </section>
@endsection
