@extends('layouts.site')

@section('content')

@php
    $panfleto ="";
    $registro_SEMOB = "";
@endphp

<div class="card-painel card-panel-espacamento">
		<div class="container">

			<div class="row">
				<div class="col m12">
					<h4><i class="small material-icons">beenhere</i> {{ $membro->nome }}</h4>
				</div>
			</div>

			<div class="row">
				<div class="col s12 m3">
					 <img src="{{ asset($membro->foto) }}" class="responsive-img imagem-detalhes-membro materialboxed">
				</div>
				@if ($membro->perfil)
					<div class="col s12 m3">
						<h5>Perfil</h5>
						<p>{{ $membro->perfil }}</p>
					</div>
				@endif
				<div class="col s12 m6" id="contatos-detalhes-membro">
					<table class="bordered">
						<h5>Contatos</h5>
						@forelse($membro->contatos->sortBy('contato') as $contato)
							@if($contato->publico == 1)
								<tr>
									<td>
										<i class="{!! $contato->icon->icon !!}" style="font-size: 20px;"></i>
										{{ $contato->contato }}</td>
								</tr>
							@endif
						@empty
							<p>Sem contatos cadastrados.</p>
						@endforelse
					</table>
				</div>
			</div>
			<hr>

			@forelse($membro->carros as $carro)
				@if($carro->ativo == 1)
					<div class="row">
						<h5>Documentação</h5>
						@if($carro->documento != null)
							<div class="col s12 m3">
								<h6>Registro SEMOB</h6>
								<img class="materialboxed responsive-img imagem-detalhes-membro" src="{{ asset($carro->documento) }}">
							</div>
						@endif
						@if($membro->documento != null)
							<div class="col s12 m3">
								<h6>Registro SEMOB</h6>
								<img class="materialboxed responsive-img imagem-detalhes-membro" src="{{ asset($membro->documento) }}">
							</div>
						@endif
						@if($carro->alvara_SEMOB != null)
							<div class="col s12 m3">
								<h6>Alvará de Licença SEMOB</h6>
								<img class="materialboxed responsive-img imagem-detalhes-membro" src="{{ asset($carro->alvara_SEMOB) }}">
							</div>
						@endif
						@if($membro->certificado != null)
							<div class="col s12 m3">
								<h6>Certificado SEST SENAT</h6>
								<img class="materialboxed responsive-img imagem-detalhes-membro" src="{{ asset($membro->certificado) }}">
							</div>
						@endif
					</div>

					<hr>

					{{-- Escolas e Bairros --}}
					<div class="row">
						@if(count($membro->escolas) > 0)
						<div class="col s12 m6">
							<h5><i class="material-icons">school</i> Escolas e Faculdades</h5>
							@foreach ($membro->escolas as $e)
								<div class="chip" style="font-size:1rem; background-color:#1de9b6;">{{ $e->nome }}</div>
							@endforeach
							{{-- <ul class="collection">
		    					@foreach($membro->escolas->sortBy('nome') as $escola)
		    						<li class="collection-item">
		    						    <b>{{ $escola->nome }} </b>
		    						    <br>
		    						    <small>
		    						        {!! $escola->endereco !!}
		    						    </small>
		    							<!-- img src="{{ asset($escola->logomarca) }}" class="responsive-img imagem-detalhes-membro" -->
		    						</li>
		    					@endforeach
							</ul> --}}
						</div>
					@endif
					@if(count($membro->bairros) > 0)
						<div class="col s12 m6">
							<h5><i class="material-icons">gps_fixed</i> Bairros</h5>
							@foreach ($membro->bairros as $b)
								<div class="chip" style="font-size:1rem; background-color:#ffd740;">{{ $b->nome }}</div>
							@endforeach
							{{-- <ul class="collection">
								@foreach($membro->bairros->sortBy('nome') as $bairro)
									<li class="collection-item">
										<b>{{ $bairro->nome }}</b>
										<small>({{ $bairro->cidade }})</small>.
									</li>
								@endforeach
							</ul> --}}
						</div>
					@endif
					</div>
					{{-- / Escolas e Bairros --}}

					<hr>

					<div class="row">
						<div class="col m12">
							{{-- <h4><i class="medium material-icons">check</i> Dados do Carro</h4> --}}
							<h5><i class="material-icons">directions_bus</i> Dados do Carro</h5>
						</div>
						<table class="bordered">
							<tr>
								<th>Número de Registro (vistoria) SEMOB: </th>
									@php
										$registro_SEMOB = $carro->registro_SEMOB != "" ? $carro->registro_SEMOB : "";
									@endphp
								<td><span style="font-size: 25px;">{{ $carro->registro_SEMOB }}</span></td>
							</tr>
							<tr>
								<th>Tipo: </th>
								<td>{{ $carro->tipo }}</td>
							</tr>
							<tr>
								<th>Descrição: </th>
								<td>{!! $carro->descricao !!}</td>
							</tr>
						</table>
					</div> <!-- fim row -->


					<div class="row">
						<div class="card-panel pink lighten-1">
							<h4>
								<span class="white-text text-darken-2">Galeria</span>
							</h4>
						</div>

						@foreach($carro->imagens as $imagem)
							@if($imagem->tipo && $imagem->tipo == "Carro")
								<div class="col s12 m4">
									<img class="materialboxed responsive-img imagem-detalhes-membro" src="{{ asset($imagem->imagem) }}">
								</div>
							@else
								@php
									$panfleto = $imagem->imagem;
								@endphp
							@endif
						@endforeach
					</div>

				@endif
			@empty
				<p>...</p>
			@endforelse


			<div class="row">
				@php
					$acompanhantes = $membro->acompanhantes()->where('ativo', 1)->get();
				@endphp
			    @if(count($acompanhantes) > 0)
					<div class="col S12 m5">
						<h4><i class="medium material-icons">check</i> Acompanhante</h4>
						@forelse($acompanhantes as $acompanhante)
							<h5>{{ $acompanhante->nome }}</h5>
							@if($acompanhante->alvara_SEMOB)
							    <img src="{{ asset($acompanhante->alvara_SEMOB) }}" class="responsive-img imagem-detalhes-membro">
							@endif
						@empty
							<p>Sem Acompanhantes cadastrados.</p>
						@endforelse
					</div>
				@endif

                @if(isset($panfleto) && $panfleto != "")
    				<div class="col S12 m7">
    					<h4><i class="medium material-icons">check</i> Panfleto</h4>
    						<img src="{{ asset($panfleto) }}" class="responsive-img imagem-detalhes-membro">
    				</div>
				@endif
			</div>

			<div class="row card-panel grey white-text">
			    <div class="col s12 m12">
				    <strong>
					    Registrado e vistoriado na SEMOB (nº {{$registro_SEMOB}}). Possui alvará, selo de vistoria e acompanhante cadastrada.
				    </strong>
			    </div>
			</div>
</div>

		<!-- Patrocinadores particulares -->
		@if(count($membro->patrocinios) > 0)
    		<div class="card-painel white card-panel-espacamento">
    			<div class="container">
    				<h4>Patrocinadores para {{$membro->nome}}</h4>

    				<div class="row">
    					@forelse($membro->patrocinios as $patrocinio)
    						<div class="col s12 m3">
    							<img src="{{ asset($patrocinio->logomarca) }}" class="responsive-img imagem-detalhes-membro">
    						</div>
    					@empty
    						<p>Sem Patrocínios cadastrados.</p>
    					@endforelse
    				</div>

    			</div>
    		</div>
		@endif

	</div> <!-- / container-->
</div>



@endsection
