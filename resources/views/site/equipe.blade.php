@extends('layouts.site')

@section('content')

<div class="card-painel card-panel-espacamento">
	<div class="container">
		<h4 class="center">Nossa Equipe</h4>
		<div class="row">
			@foreach($membros->where('ativo', '=', 1)->sortBy('nome') as $membro)
				<div class="col s6 m2" style="height:320px;">
		          <a href="{{ route('sites.detalhes-do-membro', ['id' => $membro->id]) }}" title="{{ asset($membro->nome) }}">
			        	<div class="card amber lighten-2" style="padding:5px; height:230px;">
			            	<div class="card-image">
			              		<img src="{{ asset($membro->foto) }}">
												{{-- <div style="text-align:center; color:black;">{!! $membro->nome !!}</div> --}}
			            	</div>
			            	<div class="card-content center" style="padding:5px;">
			              		<p style="color:#000;"><b>{!! $membro->nome !!}</b></p>
			            	</div>
			          	</div>
			        </a>
		        </div>
			@endforeach
		</div>
	</div>
</div>



@endsection
