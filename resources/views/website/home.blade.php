@extends('website/layout')
@section('title')
Home 
@endsection
@section('content')
<style>
    body{
    background-color: rgb(182, 212, 197);
}

.opensans{
    font-family: 'Open Sans', sans-serif;
    font-size: 24px;
}
.w-15{
    width:15%;
}
.bg-green{
    background-color: #58eb34;
}
.ml-15{
    margin-left:15px;
    margin-right:15px;
}
 </style>
<div class="container-fluid text-secondary">
    

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-2"></div>
            <div class="col-md-8 p-0">
                <img class=" img-fluid rounded" src="{{ asset('website/pencil.png') }}" alt="pencils">
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
             <form action="signup" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-12 bg-white mt-3 rounded text-dark text-left pb-3">
                      Welcome {{ Auth::user()->name  }} <a style="float:right;" href="{{ url('/logout') }}"> logout </a>

                        <p class=" pt-3 opensans">Inschrijfformulier GLU Academy</p>
                        <p>{{ $vragen->uitleg }}</p>
                        <p class="text-danger pb-3">* Vereist</p>
                    </div>
                </div>
                <div class="row mt-3 bg-white rounded">
                    <div class="col-md-12 pt-4 pb-4">                    
                        <p class="h5 text-dark pb-3">1) {{ $vragen->vraag1 }} <span class="text-danger"> *</span></p>
                        <select name="training" class="w-25 border-0" required>
                            @foreach ($vraag1 as $vraag1 )
                                 <option value="{{ $vraag1->vraag }}">{{ $vraag1->vraag }}</option>
                            @endforeach
                           
                        </select>
                        <hr align="left" class="w-25"> 
                    </div>
                </div>
                <div class="row mt-3 bg-white rounded pt-4 pb-4">
                    <div class="col-md-12">
                        <p class="h5 text-dark pb-3">2) {{ $vragen->vraag2 }} <span class="text-danger"> *</span></p>
                        <select name="ophoogte" class="w-2 border-0" required>
                        @foreach ($vraag2 as $vraag2 )
                                <option value="{{ $vraag2->vraag }}">{{ $vraag2->vraag }}</option>

                        @endforeach
                            
                        </select>
                        <hr align="left" class="w-50">
                    </div>
                </div>
                <div class=" pt-3 pb-3 row mt-3 bg-white rounded">
                    <div class="col-md-12">
                        <p class="h5 text-dark mt-3 pb-3">3) {{ $vragen->vraag3 }} <span class="text-danger"> *</span></p>
                        <input class="border-0" name="bijzonderheden"placeholder="Jouw antwoord" type="text" required>
                        <hr class="mt-0">
                    </div>
                </div>
                <div class="row" style="margin-bottom: 50px;">
                    <div class=" p-0 col-md-12 mt-3">
                      
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                            inleveren
                          </button>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Bevestiging</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Bekijk je antwoorden goed je kan ze niet wijzigen
                    </div>
                    <div class="modal-footer">
                      <input type="submit" value="inleveren" class="btn btn-success" />
                    </div>
                  </div>
                </div>
              </div>
        </form>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>

@endsection