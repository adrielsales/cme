@extends('layouts.site')

@section('content')

<div class="card-painel white card-panel-espacamento">
	<div class="container white">
		<div class="titulo-contato">
			<h4 class="center">Escolas e Instituições de Ensino</h4>
		</div>
		<div class="row">
			@foreach($escolas as $escola)->orderBy('nome')
				<div class="col s6 m2">
		          <div class="card">
		            <div class="card-image">
		              <img src="{{ asset($escola->logomarca) }}">
		            </div>
		            <div class="card-content center">
		              <p>{!! $escola->endereco !!}</p>
		            </div>
		            <div class="card-action center">
		              <a href="{{ route('sites.membros-da-escola', ['id' => $escola->id]) }}" class="btn btn-floating pulse">{{ count($escola->membros) }}</a>
			          <span style="font-size: 1rem; text-align: center;">Profissionais</span>
		            </div>
		          </div>
		        </div>
			@endforeach
		</div>
	</div>
</div>

@endsection