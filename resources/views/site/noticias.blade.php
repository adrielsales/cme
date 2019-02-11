@extends('layouts.site')

@section('content')

<div class="card-painel card-panel-espacamento">
	<div class="container">
		<div class="titulo-contato">
			<h4 class="center">Notícias</h4>
		</div>
		<div class="row">

            <ul class="collection">
                @foreach ($noticias as $noticia)
                    <a href="{{ route('sites.show-noticia', ['id' => $noticia->id]) }}">
                    <li class="collection-item avatar transparent">
                        <img src="{{ asset($noticia->capa) }}" alt="" class="circle">
                        <span class="title">{{ $noticia->titulo }}</span>
                        <span class="badge">{{ date('d/m/Y', strtotime($noticia->created_at)) }}</span>
                        <p>{{ $noticia->sub_titulo }}</p>
                    </a>
{{-- 
                        <a href="{{ route('sites.show-noticia', ['id' => $noticia->id]) }}" class="secondary-content">
                            <i class="material-icons">check</i>
                        </a> --}}
                    </li>

                @endforeach

                
                  </ul>




		</div>
	</div>
</div>

@endsection
