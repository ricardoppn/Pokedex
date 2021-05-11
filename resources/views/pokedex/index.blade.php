@extends('home')
@section('conteudo')
    <div class="col-sm-12">
        @foreach ( $arrayPokemon as $pokemon )
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="{{$pokemon->getImagem()}}" alt="">
                        <div class="caption">
                            <h3>{{ucwords($pokemon->getName())}}</h3>
                            <p><a href="/{{$pokemon->getId()}}" class="btn btn-primary">Detalhes</a></p>
                        </div>
                    </div>
                </div>

        @endforeach
        </div>
@endsection
