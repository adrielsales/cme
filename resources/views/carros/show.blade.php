@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <h2><span style="color: #999;">Detalhes do Carro:</span> <strong>{{ $carro->tipo }}</strong></h2>
        <a href="{{ route('carros.edit', ['carro' => $carro->id]) }}" class="btn btn-primary btn-md">Editar</a>
        <hr>
        <div class="col-md-3">
            <h5 class="alert alert-info">Documento</h5>
            <img src="{{ asset($carro->documento) }}" class="img-thumbnail">
            <p style="color: #999; font-size: 8px;">{{ asset($carro->documento) }}</p>
        </div>
        <div class="col-md-3">
            <h5 class="alert alert-info">Alvará SEMOB</h5>
            <img src="{{ asset($carro->alvara_SEMOB) }}" class="img-thumbnail">
            <p style="color: #999; font-size: 8px;">{{ asset($carro->alvara_SEMOB) }}</p>
        </div>
        <div class="col-md-6">
            <h5 class="alert alert-success">Detalhes</h5>
            <table class="table table-striped">
                <tr>
                    <th>Registro:</th>
                    <td>
                         <span class="badge" style="font-size: 20px;">{{ $carro->registro_SEMOB }}</span>
                    </td>
                </tr>
                <tr>
                    <th>Descrição:</th>
                    <td> {!! $carro->descricao !!}</td>
                </tr>
                <tr>
                    <th>Proprietário:</th>
                    <td> {{ $carro->membro->nome }}</td>
                </tr>
                <tr>
                    <th>Estado:</th>
                    <td onclick="mudaEstadoCarro('{{$carro->id}}');" id="alterarEstado_{{$carro->id}}">
                        {!! Html::iconeParaEstado($carro->ativo) !!}
                        <button class="btn btn-xs"> Mudar</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>


    {{-- IMAGENS DE UM CARRO --}}

    <div class="row backgroundParaListagensShow">
        <h2><span style="color: #999;">Imagens cadastradas</span></h2>
      <a href="{{ route('images.form', ['carro_id' => $carro->id]) }}" class="btn btn-success btn-md">Adicionar Imagens para este carro</a>
        <hr>

        @forelse($carro->imagens as $imagem)
            <div class="col-md-2" id="imagem{{$imagem->id}}">
                <div class="thumbnail">
                    <img src="{{ asset($imagem->imagem) }}" alt="{{ $imagem->titulo }}">
                    <div class="caption">
                        <h3>{{ $imagem->titulo }}</h3>
                        <p>{!! $imagem->descricao !!}</p>
                        <p>Tipo: {{ $imagem->tipo }}</p>
                        <p>
                            <button
                                onclick="deletarImagem({{$imagem->id}});"
                                class="btn btn-warning">
                                Desvincular
                            </button>
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <p class="alert alert-warning">Sem itens cadastrador no sistema.</p>
        @endforelse

    </div> <!-- /row imagens -->

</div> <!-- /container -->


@endsection

@section('post-script')
    <script type="text/javascript">

        function deletarImagem(idImagem){
            $.get('/images/' + idImagem +'/deletarImagem', function(resultado){
            	$("#imagem" + idImagem).remove();
            });
        }

        function mudaEstadoCarro(idDoObjetoQueIraTrocarOEstado){
            $.get('/carros/' + idDoObjetoQueIraTrocarOEstado + '/mudaEstadoCarro', function(novoEstado){
                var htmlParaNovoEstado = "";
                if(novoEstado == 1){
                    htmlParaNovoEstado = '<span style="color:lawngreen" class="glyphicon glyphicon-ok-sign" aria-hidden="true" title="Ativo"></span> <button class="btn btn-xs"> Alterar</button>';
                } else {
                    htmlParaNovoEstado = '<span style="color:salmon" class="glyphicon glyphicon-minus-sign" aria-hidden="true" title="inativo"></span> <button class="btn btn-xs"> Alterar</button>';
                }
                document.getElementById('alterarEstado_'+idDoObjetoQueIraTrocarOEstado).innerHTML = htmlParaNovoEstado;
                //alert(novoEstado);
            });
        }
    </script>
@endsection
