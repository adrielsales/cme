<!-- rotas start -->
<div class="card-painel card-panel-espacamento">
	<div class="container">
		<div class="index-titulo-escolas">
			<h3 class="center">Transporte Escolar e Universitário</h3>
		</div>

		<div class="row">
			{{-- <div class="col s12 m10 offset-m1"> --}}
			<div class="col s12 m12">
				<div class="card horizontal index-onibus-escolas">
					<div class="card-stacked">
						<div class="card-content">
							<span class="card-title">Direção com responsabilidade, segurança e pontualidade!</span>
							<p class="index-paragrafo-escolas">
								<a href="{{ url('/listaDeEscolas') }}">
									Somos um instrumento facilitador no trânsito,
									colaborando diariamente com centenas de estudantes,
									das mais diversas escolas e universidades.
									Atuamos em todos os bairros da Grande João Pessoa,
									transportando com segurança e pontualidade.
								</a>
							</p>
							<hr>
							@foreach($escolas as $escola)
								<a href="{{ url('/listaDeEscolas') }}">
									<img width="50" src="{{ asset($escola->logomarca) }}">
								</a>
							@endforeach
						</div>
						 <div class="card-action center-align">
		                  <a href="{{ url('/listaDeEscolas') }}" class="btn waves-effect waves-teal btn-large">Clique Aqui e Confira</a>
			            </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /rotas stop -->
