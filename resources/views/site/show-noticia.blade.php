@extends('layouts.site')

@section('content')

<div class="card-painel card-panel-espacamento">
	<div class="container">
		<div class="row">
		<h5>{{ $noticia->titulo }}</h5>
		<h6>{{ $noticia->sub_titulo }}</h6>
			<div>
				{!! $noticia->texto !!}

			</div>
		</div>
	</div>
</div>

@endsection
