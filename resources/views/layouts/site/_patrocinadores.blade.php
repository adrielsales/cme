<div class="card-painel white card-panel-espacamento">
	<div class="container index-titulo-escolas">
		<h3 class="center">
			Patrocinadores
		</h3>

		<div class="row">
			@forelse($patrocinadores_globais as $patrocinador)
				<div class="col s12 m6">
					<img src="{{ asset($patrocinador->imagem) }}">
				</div>
			@empty
				<p>Não há itens no sistema.</p>
			@endforelse
		</div>

	</div>
</div>
