@extends('layouts.site')

@section('content')

<div class="card-painel card-panel-espacamento">
	<div class="container">
		<div class="titulo-contato">
			<h4 class="center">Notícias</h4>
		</div>
		<div class="row">

            <ul class="collection" style="border: transparent;">
                @foreach ($noticias as $noticia)
                    <a href="{{ route('sites.show-noticia', ['id' => $noticia->id]) }}">
                        <li class="collection-item avatar transparent" style="border-bottom: #b2dfdb dashed 1px;">
                            <img src="{{ asset($noticia->capa) }}" alt="" class="circle">
                            <span class="title" style="color: black;">{{ $noticia->titulo }}</span>
                            <span class="badge">{{ date('d/m/Y', strtotime($noticia->created_at)) }}</span>
                            <p style="color: #666;">{{ $noticia->sub_titulo }}</p>
                        </li>
                    </a>

                @endforeach

                
                  </ul>




		</div>
	</div>
</div>

@endsection
