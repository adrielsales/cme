@extends('layouts.site')

@section('content')

<div class="card-painel card-panel-espacamento">
	<div class="container">
		<div class="row">
			<h4>{{ $noticia->titulo }}</h4>
			<p style="font-style: italic; color: #666; font-size: 12px;">Publicada em {{ date('d/m/Y', strtotime($noticia->created_at)) }}</p> 
			<h5>{{ $noticia->sub_titulo }}</h5>
			<p>{!! $noticia->texto !!}</p>
		</div>
	</div>
</div>

@endsection
