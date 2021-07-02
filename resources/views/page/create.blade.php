@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-12 m-3">
                <a href="{{route('home')}}"><i class="fa fa-arrow-circle-left" aria-hidden="true"> Indietro</i></a>
            </div>
        </div>


        <div class="row">

            <div class="col-12 card p-4">
    
                {{-- form per aggiunta di nuobi task --}}
                <form action="{{route('store')}}" method="post">
    
                    @csrf
                    @method("post")
        
                    <div class="col-12 d-lg-flex">
    
                        <div class="col-md-12 col-lg-4 mt-3">
                            <label for="titolo">Titolo</label>
                            <input name="titolo" type="text" minlength="3" maxlength="45" style="width: 100%" required placeholder="Inserisci min 3 caratteri">
                        </div>
                        
                        <div class="col-md-12 col-lg-8 mt-3">
                            <label for="info">Informazioni</label>
                            <input name="info" type="text" minlength="3" maxlength="400" style="width: 100%" required placeholder="Inserisci min 3 caratteri">
                        </div>
                        
                    </div>

                    <div class="col-12 mt-5">
                        <label for="note">Note</label>
                        <textarea id="w3review" name="note" rows="4" style="width: 100%" placeholder=" Inserisci le note" maxlength="600" ></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary m-3">Aggiungi</button>

                </form>

            </div>

        </div>

    </div>
@endsection