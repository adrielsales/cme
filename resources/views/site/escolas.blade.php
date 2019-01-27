@extends('layouts.site')

@section('content')

<div class="card-painel card-panel-espacamento">
	<div class="container">
		<div class="titulo-contato">
			<h4 class="center">Escolas e Instituições de Ensino</h4>
			    <blockquote class="center escolas-blockquote">
						Clique em uma das escolas abaixo e verifique quais membros de nossa equipe poderão lhe ajudar.
					</blockquote>
		</div>
		<div class="row">

			<div id="van-legalizada">
				<div class="van-legalizada-textos flow-text">
					<ul class="collection">
						@foreach ($escolas as $escola)
							<li class="collection-item item-lista-de-escolas">
								<a href="{{ route('sites.membros-da-escola', ['id' => $escola->id]) }}">
									<img src="{{ asset($escola->logomarca) }}" style="max-width:40px; margin:0 auto;">
									<i class="material-icons">send</i> 
									{{ $escola->nome }}
								</a>
							</li>
						@endforeach
					</ul>
				</div>
			</div>


			{{-- @foreach($escolas as $escola)
				<div class="col s6 m3">
				<a href="{{ route('sites.membros-da-escola', ['id' => $escola->id]) }}">
		          <div class="card grey lighten-4" style="height:200px; padding:8px;">
		            <div class="card-image" style="overflow: hidden;">
		              <img src="{{ asset($escola->logomarca) }}" style="max-width:100px; margin:0 auto;">
		            </div>
		            <div class="card-action center" style="padding:10px;">
		              <!--<a href="{{ route('sites.membros-da-escola', ['id' => $escola->id]) }}" class="btn btn-floating pulse">
									{{ count($escola->membros) }}</a>-->
			          <span style="font-size:1rem; text-align:center;">{{ $escola->nome }}</span>
		            </div>
		          </div>
		          </a>
		        </div>
			@endforeach --}}
		</div>
	</div>
</div>

@endsection
