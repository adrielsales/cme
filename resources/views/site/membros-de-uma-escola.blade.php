@extends('layouts.site')

@section('content')

<div class="card-painel card-panel-espacamento">
	<div class="container">
		<div class="titulo-contato">
			<h5 class="center" style="font-family: 'Open Sans', sans-serif; color:#666;"><b>{{ $nomeDaEscola }}</b>, conta com estes profissionais para o transporte escolar:</h5>
		</div>
		<div class="row">
			{{-- @foreach($membros->where('ativo', '=', 1)->sortBy('nome') as $membro)
				<div class="col s12 m2" style="height:320px;">
					<a href="{{ route('sites.detalhes-do-membro', ['id' => $membro->id]) }}">
			          <div class="card amber lighten-2" style="padding:5px; height:230px;">
			            <div class="card-image responsive-img" style="overflow: hidden;">
			              <img src="{{ asset($membro->foto) }}">
			            </div>
			            <div class="card-content center" style="padding:5px;">
			              <p style="color:#000;"><b>{!! $membro->nome !!}</b></p>
			            </div>
			          </div>
			      </a>
		    </div>
			@endforeach --}}
			@foreach($membros->where('ativo', '=', 1)->sortBy('nome') as $membro)
				{{-- <div class="col s12 m2">
					<a href="{{ route('sites.detalhes-do-membro', ['id' => $membro->id]) }}">
								<div class="card">
									<div class="card-image">
										<img src="{{ asset($membro->foto) }}">
										<span class="card-title">{!! $membro->nome !!}</span>
									</div>
									<div class="card-content">
										<p><b>{!! $membro->nome !!}</b></p>
									</div>
								</div>
						</a>
				</div> --}}
					<div class="col s12 m3">
						<div class="card">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="{{ asset($membro->foto) }}">
              </div>
              <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">{!! $membro->nome !!}<i class="material-icons right">more_vert</i></span>

                {{-- <p><a href="{{ route('sites.detalhes-do-membro', ['id' => $membro->id]) }}">Contatos</a></p> --}}
              </div>
              <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">{!! $membro->nome !!}<i class="material-icons right">close</i></span>
                <p>{{$membro->perfil}}</p>
								<hr>
								<p>
									<b>Bairros:</b>
									@php
										$lista = $membro->bairros->sortBy('nome');
									@endphp
									@foreach ( $lista as $bairro)
										{{ $bairro->nome}}@if ($bairro != $lista->last()), @else. @endif
									@endforeach
								</p>
								{{-- <p><a href="{{ route('sites.detalhes-do-membro', ['id' => $membro->id]) }}">Contatos</a></p> --}}
								  <a href="{{ route('sites.detalhes-do-membro', ['id' => $membro->id]) }}" class="btn">Contatos</a>
              </div>

              <div class="card-action">
                <a href="{{ route('sites.detalhes-do-membro', ['id' => $membro->id]) }}" class="btn">Contatos</a>
              </div>
            </div>
					</div>
			@endforeach
		</div>
	</div>
</div>



@endsection
