@extends('layouts.app')

@section('content')
    
    <div class="container">

        <div class="row">
            <div class="col-sm-12 d-lg-flex justify-content-sm-around m-3">
                <h2 class="col-md-12 col-lg-6 text-lg-center">
                    Elenco Task
                </h2>
                <div class="col-md-12 col-lg-6 text-lg-center">
                    <a href="{{route('create')}}" class="btn btn-success">Aggiungi Task</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table bg-white">
                
                    {{-- condizione che mostra i task solo se presenti --}}
                    @if (count($tasks) === 0)
                  
                        <h2 class="card m-2 p-5 text-center">Nessun Task presente</h2>
                  
                    @else

                        <thead class="thead-dark border border-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">TITOLO</th>
                                <th scope="col" class="text-right">AZIONE</th>
                            </tr>
                        </thead>
                        <tbody class="border">
                        
                        @foreach ($tasks as $item)

                            <tr>

                                <td scope="row">
                                    {{-- Id: {{$item -> id}} - --}}
                                    {{$loop -> index + 1}}

                                </td>

                                <td scope="row">
                                    {{-- Id: {{$item -> id}} - --}}
                                    {{$item -> titolo}}

                                </td>

                                <td scope="row" class="text-right">

                                    <a class="" href="{{route('show', $item -> id)}}">
                                        Dettagli
                                    </a>

                                </td>

                            </tr>
                        @endforeach
                            
                        </tbody>

                    @endif

                </table>
            </div>
        </div>

    </div>

@endsection
