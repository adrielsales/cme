@extends('layouts.site')

@section('content')

<div class="card-painel card-panel-espacamento">
	<div class="container">
		<div class="row">
			<div class="titulo-contato">
				<h4 class="center">Um pouco sobre a Conexão</h4>
				<h5>Somos um instrumento facilitador no trânsito!</h5>
			</div>

			<blockquote>
				<p>
					Formada por profissionais capacitados para melhor lhe servir, prezando pela responsabilidade, segurança e pontualidade, a Conexão Mulheres no Escolar é instrumento facilitador no trânsito, colaborando diariamente com centenas de estudantes, das mais diversas escolas e universidades da grande João Pessoa.
				</p>
			</blockquote>
		</div>
	</div>
</div>

<div class="card-painel pink lighten-3 card-panel-espacamento lista-membros-pagina-sobre">
	<div class="container">
		<div class="row">
		    <h4>Nosso Time de Profissionais</h4>
			@foreach($membrosEAcompanhantes as $membro)
				@if($membro->foto)
					<a href="{{ route('sites.detalhes-do-membro', ['id' => $membro->id]) }}">
						<img width="150" src="{{ asset($membro->foto) }}" 
						 title="{{ $membro->nome }}">
					</a>
				@endif
			@endforeach
		</div>
	</div>
</div>


		{{-- Vídeo Facebook --}}
<div class="container">
	
		<div class="row">

			<script>
				window.fbAsyncInit = function() {
					FB.init({
						appId            : 'your-app-id',
						autoLogAppEvents : true,
						xfbml            : true,
						version          : 'v2.11'
					});
				};

				(function(d, s, id){
					var js, fjs = d.getElementsByTagName(s)[0];
					if (d.getElementById(id)) {return;}
					js = d.createElement(s); js.id = id;
					js.src = "https://connect.facebook.net/en_US/sdk.js";
					fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));
			</script>


			<div class="video-container">
				<div class="fb-video" data-href="https://www.facebook.com/servilha.jo.5/videos/154213631993893/"  
				data-allowfullscreen="true" ></div>
			</div>

			{{-- / Vídeo Facebook --}}

		</div>
</div>


	@endsection