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
		</div>
	</div>
</div>

@endsection
