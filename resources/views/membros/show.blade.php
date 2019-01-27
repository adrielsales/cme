@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row backgroundParaListagensShow">
        <h2>{{ $membro->nome }}</h2>
        <a href="{{ route('membros.edit', ['membro' => $membro->id]) }}" class="btn btn-primary btn-md">Editar</a>
        <hr>
        <div class="col-md-2">
            <h5 class="text-info">
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
							Foto do Perfil</h5>
            <img src="{{ asset($membro->foto) }}" class="img-thumbnail">
        </div>
				<div class="col-md-4">
					<h5 class="text-info">
						<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
							Perfil
					</h5>
						@if($membro->perfil)
					<p>{{ $membro->perfil }}</p>
					@else
						<p class="text-warning">Não há perfil cadastrado.</p>
					@endif
				</div>
        <div class="col-md-2">
            <h5 class="text-info">
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
							Certificado</h5>
            @if($membro->certificado)
                <img src="{{ asset($membro->certificado) }}" class="img-thumbnail">
            @else
                <p class="text-warning">Não há Certificado.</p>
            @endif
        </div>
				<div class="col-md-2" id="documento{{$membro->id}}">
            <h5 class="text-info">
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
							Outro Documento
						</h5>
						@if($membro->documento)
            <img src="{{ asset($membro->documento) }}" class="img-thumbnail">
						<button
								onclick="apagarDocumento({{$membro->id}});"
								class="btn btn-danger">
								Apagar
						</button>
					@else
							<p class="text-warning">Não há Documentos.</p>
					@endif
        </div>
				<div class="col-md-2">
            <h5 class="text-info">
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
							Vídeo Divulgação</h5>
            @if($membro->url_video)
                <div class="embed-responsive embed-responsive-4by3">
                  <iframe class="embed-responsive-item" src="{{ asset($membro->url_video) }}"></iframe>
                </div>
            @else
                <p class="text-warning">Não há vídeo cadastrado.</p>
            @endif
        </div>
    </div>

    {{-- ACOMPANHANTES --}}

    <hr>
    <h2>Acompanhante</h2>
    <a href="{{ route('acompanhantes.novo', ['membro' => $membro->id]) }}" class="btn btn-success btn-md">Adiconar Acompanhante</a>
    <hr>
    @forelse($membro->acompanhantes as $acompanhante)
        <div class="row">
            <table class="table table-striped">
                <tr>
                    <th>Alvará SEMOB</th>
                    <th>Nome</th>
                    <th>Estado</th>
                    <th>Ações</th>
                </tr>
                <tr>
                    <td>
                        <img src="{{ asset($acompanhante->alvara_SEMOB) }}" class="img-thumbnail" width="200px">
                    </td>
                    <td><h4>{{$acompanhante->nome}}</h4></td>
                    <td onclick="mudaEstadoAcompanhante('{{$acompanhante->id}}');" id="alterarEstado_{{$acompanhante->id}}">
                        {!! Html::iconeParaEstado($acompanhante->ativo) !!}
                        <button class="btn btn-default"> Alterar</button>
                    </td>
                    <td>
                        <a href="{{ route('acompanhantes.edit', ['acompanhante' => $acompanhante->id]) }}" class="btn btn-primary btn-md">Editar</a>
                        @php $deleteForm = "delete-form-{$loop->index}"; @endphp
                        <a href="{{ route('acompanhantes.destroy',['idAcompanhante' => $acompanhante->id]) }}" onclick="event.preventDefault();document.getElementById('{{$deleteForm}}').submit()" class="btn btn-danger">Excluir</a>
                        {!! Form::open([
                            'route' => ['acompanhantes.destroy', 'idAcompanhante' => $acompanhante->id],
                            'method' => 'DELETE', 'id' => $deleteForm, 'style' => 'display:none'])
                        !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            </table>
        </div>
    @empty
        <p class="text-warning">Não há Registros</p>
    @endforelse

    {{-- FIM ACOMPANHANTE --}}

    {{-- PATROCÍNIOS --}}

    <hr>
    <h2>Patrocínios</h2>
    <a href="{{ route('membros.create-patrocinio', ['membro' => $membro->id]) }}" class="btn btn-success btn-md">Adiconar Patrocínio</a>
    <hr>
        <div class="row backgroundParaListagensShow">
            <table class="table table-striped">
                <tr>
                    <th>Logomarca</th>
                    <th>Nome</th>
                    <th>Estado</th>
                    <th>Ações</th>
                </tr>
            @forelse($membro->patrocinios as $patrocinio)
                <tr>
                    <td>
                        <img src="{{ asset($patrocinio->logomarca) }}" class="img-thumbnail" width="100px">
                    </td>
                    <td><h4>{{$patrocinio->nome}}</h4></td>
                    <td onclick="mudaEstadoPatrocinio('{{$patrocinio->id}}');" id="alterarEstado_{{$patrocinio->id}}">
                        {!! Html::iconeParaEstado($patrocinio->ativo) !!}
                        <button class="btn btn-default"> Alterar</button>
                    </td>
                    <td>
                        <a href="{{ route('membros.edit-patrocinio', ['patrocinio' => $patrocinio->id]) }}" class="btn btn-primary btn-md">Editar</a>
                        @php $deleteForm = "delete-form-{$loop->index}"; @endphp
                        <a href="{{ route('membros.destroy-patrocinio',['idpatrocinio' => $patrocinio->id]) }}" onclick="event.preventDefault();document.getElementById('{{$deleteForm}}').submit()" class="btn btn-danger">Excluir</a>
                        {!! Form::open([
                            'route' => ['membros.destroy-patrocinio', 'idPatrocinio' => $patrocinio->id],
                            'method' => 'DELETE', 'id' => $deleteForm, 'style' => 'display:none'])
                        !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @empty
                <p class="text-warning">Não há Registros</p>
            @endforelse
            </table>
        </div>

    {{-- FIM PATROCÍNIOS --}}

    {{-- CONTATOS --}}
    <hr>
        <div class="row">
            <div class="col-md-6">
                <h2>Contatos</h2>
                <a href="{{ route('contatos.novo', ['membro' => $membro->id]) }}" class="btn btn-success btn-md">Adiconar Contato</a>
                <hr>
                <table class="table table-striped">
                    <tr>
                        <th>Contato</th>
                        <th>Visibilidade</th>
                        <th>Estado</th>
                        <th>Ações</th>
                    </tr>
                    @forelse($membro->contatos as $contato)
                    <tr>
                        <td style="font-size: 15px">
                            <i class="{!! $contato->icon->icon !!}"></i> {{ $contato->icon->nome }}: {{ $contato->contato }}
                        </td>
                        <td onclick="mudaVisibilidadeContato({{$contato->id}});" id="alterarVisibilidade_{{$contato->id}}">
                            {!! Html::iconeParaEstado($contato->publico) !!}
                            <button class="btn btn-default"> Alterar</button>
                        </td>
                        <td onclick="mudaEstadoAtivoContato({{$contato->id}});" id="alterarEstado_{{$contato->id}}">
                            {!! Html::iconeParaEstado($contato->ativo) !!}
                            <button class="btn btn-default"> Alterar</button>
                        </td>
                        <td>
														<a href="{{ route('contatos.edit', ['contato' => $contato->id]) }}" class="btn btn-primary btn-xs">Editar</a>
                            @php $deleteForm = "delete-form-{$loop->index}"; @endphp
                            <a href="{{ route('contatos.destroy',['idContato' => $contato->id]) }}" onclick="event.preventDefault();document.getElementById('{{$deleteForm}}').submit()" class="btn btn-danger btn-xs">Excluir</a>
                            {!! Form::open([
                                'route' => ['contatos.destroy', 'idContato' => $contato->id],
                                'method' => 'DELETE', 'id' => $deleteForm, 'style' => 'display:none'])
                            !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @empty
                        <p class="text-warning">Não há Registros</p>
                    @endforelse
                </table>
            </div><!-- primeira coluna -->
            <div class="col-md-6">
                <h2>Bairros</h2>
                <a href="{{ route('membros.create-bairro', ['membro' => $membro->id]) }}" class="btn btn-success btn-md">Adiconar Bairrro</a>
                <hr>
                <table class="table table-striped">
                    <tr>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>Excluir</th>
                    </tr>
                    @forelse($membro->bairros->sortBy('nome') as $bairro)
                        <tr>
                            <td>{{ $bairro->nome }}</td>
                            <td>{{ $bairro->cidade }}</td>
                            <td>
                            @php $deleteForm = "delete-form-{$loop->index}"; @endphp
                            <a href="{{ route('membros.destroy-bairro',['idMembro' => $membro->id, 'idBairro' => $bairro->id]) }}" onclick="event.preventDefault();document.getElementById('{{$deleteForm}}').submit()" class="btn btn-danger">Desvincular</a>
                            {!! Form::open([
                                'route' => ['membros.destroy-bairro', 'idMembro' => $membro->id, 'idBairro' => $bairro->id],
                                'method' => 'DELETE', 'id' => $deleteForm, 'style' => 'display:none'])
                            !!}
                            {!! Form::close() !!}
                        </td>
                        </tr>
                    @empty
                    @endforelse
                </table>
            </div>
        </div>

    {{-- FIM CONTATOS --}}

    {{-- ESCOLAS --}}

    <hr>
    <div class="row">
        <h2>Escolas</h2>
        <a href="{{ route('membros.create-escola', ['membro' => $membro->id]) }}" class="btn btn-success btn-md">Adiconar Escola</a>
        <hr>
        <table class="table table-striped">
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Excluir</th>
            </tr>
            @forelse($membro->escolas->sortBy('nome') as $escola)
                <tr id="{{$escola->id}}">
                    <td>
                        <img src="{{ asset($escola->logomarca) }}" class="img-thumbnail" width="50px">
                    </td>
                    <td>{{ $escola->nome }}</td>
                    <td>{!! $escola->endereco !!}</td>
                    <td>
                        @if($escola->id)
                            <button
                                onclick="desvinculaEscola({{$membro->id}}, {{$escola->id}});"
                                class="btn btn-warning">
                                Desvincular
                            </button>
                        @endif
                    </td>
                </tr>
            @empty
            @endforelse
        </table>
    </div>
</div> <!-- /container -->

<div class="container backgroundParaListagensShow">
    <h2><i class="fa fa-car" aria-hidden="true"></i> Carros e Imagens/Panfletos</h2>
    @forelse($membro->carros as $carro)
    <div class="row">
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

    <div class="row">
        <h2 class="col-md-12 tituloImagensCadastradasShowMembros">
            <i class="fa fa-picture-o" aria-hidden="true"></i> Imagens cadastradas
        </h2>
        @forelse($carro->imagens as $imagem)
            <div class="col-md-3" id="imagem{{$imagem->id}}">
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
															Excluir
													</button>
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <p class="alert alert-warning">Sem imagens para este carro.</p>
        @endforelse

    @empty
        <p class="alert alert-warning">Sem carros cadastrados no sistema.</p>
    @endforelse
    </div>
</div> <!-- /container -->


@endsection

@section('post-script')
    <script type="text/javascript">

				function deletarImagem(idImagem){
						$.get('/images/' + idImagem +'/deletarImagem', function(resultado){
								$("#imagem" + idImagem).remove();
						});
				}

				function apagarDocumento(idMembro){
					console.log("veio o id " + idMembro);
						$.get('/membros/' + idMembro +'/apagarDocumento', function(resultado){
								$("#documento" + idMembro).remove();
						});
				}

        function desvinculaEscola(idMembro, idEscola){
            console.log("Id do membro " + idMembro);
            console.log("Id da escola " + idEscola);
            $.get('/membros/' + idMembro + '/'+ idEscola +'/desvinculaEscola', function(resultado){
                $("#" + idEscola).remove();
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

				//ok
				function mudaEstadoAcompanhante(idDoObjetoQueIraTrocarOEstado){
            $.get('/acompanhantes/' + idDoObjetoQueIraTrocarOEstado + '/mudaEstadoAcompanhante', function(novoEstado){
                var htmlParaNovoEstado = "";
                if(novoEstado == 1){
                    htmlParaNovoEstado = '<span style="color:lawngreen" class="glyphicon glyphicon-ok-sign" aria-hidden="true" title="Ativo"></span> <button class="btn btn-default"> Alterar</button>';
                } else {
                    htmlParaNovoEstado = '<span style="color:salmon" class="glyphicon glyphicon-minus-sign" aria-hidden="true" title="inativo"></span> <button class="btn btn-default"> Alterar</button>';
                }
                document.getElementById('alterarEstado_'+idDoObjetoQueIraTrocarOEstado).innerHTML = htmlParaNovoEstado;
            });
        }

        function mudaEstadoPatrocinio(idDoObjetoQueIraTrocarOEstado){
            $.get('/membros/' + idDoObjetoQueIraTrocarOEstado + '/mudaEstadoPatrocinio', function(novoEstado){
                var htmlParaNovoEstado = "";
                if(novoEstado == 1){
                    htmlParaNovoEstado = '<span style="color:lawngreen" class="glyphicon glyphicon-ok-sign" aria-hidden="true" title="Ativo"></span> <button class="btn btn-default"> Alterar</button>';
                } else {
                    htmlParaNovoEstado = '<span style="color:salmon" class="glyphicon glyphicon-minus-sign" aria-hidden="true" title="inativo"></span> <button class="btn btn-default"> Alterar</button>';
                }
                document.getElementById('alterarEstado_'+idDoObjetoQueIraTrocarOEstado).innerHTML = htmlParaNovoEstado;
            });
        }

        function mudaEstadoAtivoContato(idDoObjetoQueIraTrocarOEstado){
            $.get('/contatos/' + idDoObjetoQueIraTrocarOEstado + '/mudaEstadoAtivoContato', function(novoEstado){
                var htmlParaNovoEstado = "";
                if(novoEstado == 1){
                    htmlParaNovoEstado = '<span style="color:lawngreen" class="glyphicon glyphicon-ok-sign" aria-hidden="true" title="Ativo"></span> <button class="btn btn-default"> Alterar</button>';
                } else {
                    htmlParaNovoEstado = '<span style="color:salmon" class="glyphicon glyphicon-minus-sign" aria-hidden="true" title="inativo"></span> <button class="btn btn-default"> Alterar</button>';
                }
                document.getElementById('alterarEstado_'+idDoObjetoQueIraTrocarOEstado).innerHTML = htmlParaNovoEstado;
            });
        }

        function mudaVisibilidadeContato(idDoObjetoQueIraTrocarOEstado){
            $.get('/contatos/' + idDoObjetoQueIraTrocarOEstado + '/mudaVisibilidadeContato', function(novoEstado){
                var htmlParaNovoEstado = "";
                if(novoEstado == 1){
                    htmlParaNovoEstado = '<span style="color:lawngreen" class="glyphicon glyphicon-ok-sign" aria-hidden="true" title="Ativo"></span> <button class="btn btn-default"> Público</button>';
                } else {
                    htmlParaNovoEstado = '<span style="color:salmon" class="glyphicon glyphicon-minus-sign" aria-hidden="true" title="inativo"></span> <button class="btn btn-default"> Privado</button>';
                }
                document.getElementById('alterarVisibilidade_'+idDoObjetoQueIraTrocarOEstado).innerHTML = htmlParaNovoEstado;
            });
        }
    </script>
@endsection
