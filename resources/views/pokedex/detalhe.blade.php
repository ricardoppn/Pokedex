@extends('home')
@section('conteudo')
        <div class="col-md-offset-4 col-sm-6 col-md-4">
            <div class="thumbnail">
            <img src="{{$Pokemon->getImagem()}}" alt="">
            <div class="caption">
                <h3>{{ucwords($Pokemon->getName())}}</h3>
                @foreach ($Pokemon->getDetalhes() as $key => $detalhes )

                    @if (is_array($detalhes))

                        @switch($key)
                            @case('sprites')

                            @break
                            @case('abilities')
                                <dl class="dl-horizontal">
                                    <dt>Abilities</dt>
                                @foreach ($detalhes as $detalhe )
                                        <dd>{{$detalhe->ability->name}}</dd>
                                @endforeach
                                 </dl>
                            @break
                            @case('game_indices')
                                <dl class="dl-horizontal">
                                    <dt>Game Indices</dt>
                                @foreach ($detalhes as $detalhe )
                                        <dd>{{$detalhe->version->name}}</dd>
                                @endforeach
                                 </dl>
                            @break
                            @default

                        @endswitch
                    @endif
                @endforeach


                <p><a href="/" class="btn btn-primary" role="button">Voltar</a> </p>
            </div>
            </div>
        </div>
@endsection
