@extends('website/layout')
@section('title')
Ingeschreven 
@endsection
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
                </div>
               
                <div class="signin-form">
                    <h2 class="form-title">Je staat ingeschreven</h2> <a style="float:right;" href="{{ url('/logout') }}"> logout </a>
                  <p><span class="title">Naam: </span> {{ Auth::user()->name }}</p>
                   
                  <p><span class="title">Email: </span> {{ Auth::user()->email }}</p>

                  <p><span class="title">Klas: </span> {{ Auth::user()->klas }}</p>
                  <p><span class="title">Studentnummer: </span> {{ Auth::user()->studentnummer }}</p>

                  <p><span class="title">1) Voor welke training schrijf jij je in?</span><br> {{ Auth::user()->training }}</p>


                  <p><span class="title">2) Is je leidinggevende op de hoogte van je inschrijving? indien ja, geeft hij/zij akkoord?</span><br> {{ Auth::user()->ophoogte }}</p>


                  <p><span class="title">3) Bijzonderheden</span><br> {{ Auth::user()->bijzonderheden }}</p>


                </div>
            </div>
        </div>
    </section>
@endsection
