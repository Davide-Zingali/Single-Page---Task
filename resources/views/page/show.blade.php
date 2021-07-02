@extends('layouts.app')

@section('content')

    <div class="container">

        <a class="m-3" href="{{route('home')}}"><i class="fa fa-arrow-circle-left" aria-hidden="true"> Indietro</i></a>

        <div class="card text-white bg-secondary mt-3" style="max-width: 100%;">

            <div class="card-header d-lg-flex justify-content-sm-around">
                <div class="col-md-12 col-lg-8">

                    <h4>Dettagli del task: {{$task -> titolo}}</h4>
                </div>
                <div class="col-md-12 col-lg-4 text-right">

                    <a class="btn btn-secondary modifica" href="{{route('edit', $task -> id)}}">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"> Modifica</i>
                    </a>
                </div>
            </div>

            {{-- campo informazioni --}}
            <div class="card-body">
                <h5 class="card-title">
                    <b>Informazioni</b>
                </h5>
                <p>
                    {{$task -> info}}
                </p>
            </div>

            <hr>

            {{-- campo note --}}
            <div class="card-body">
                <h5 class="card-title">
                    <b>Note</b>
                </h5>
                <p>
                    {{$task -> note}}
                </p>
            </div>
            
        </div>

    </div>

@endsection