<!-- Depoimentos -->

<div class="card-painel grey lighten-5  card-panel-espacamento">
	<div class="container">
		<h3 class="center index-titulo-depoimentos">
			O que os nossos clientes estão falando?
		</h3>
		<div class="row">
			@forelse($mensagens as $mensagem)
				<div class="col s12 m4 ">
			    	<div class="card grey lighten-5">
		            	<div class="card-content">
			            	<cite>
				              	<p>"{{ $mensagem->mensagem }}"</p>
			            	</cite>
			            	<div class="remetente">
				            	<span class="card-title">{{ $mensagem->remetente }}</span>
			            	</div>
			            </div>
			        </div>
			    </div>
	      	@empty
	      		<p>Não há mensagens no sistema.</p>
	      	@endforelse
		</div>
	</div>
</div>

<!-- /Depoimentos -->

<!-- dê a sua sugestão -->

<div class="card-painel card-panel-espacamento" id="contato">
	<div class="container">
		<h4 class="center index-titulo-depoimentos">
			<span class="white-text">
				Sua opinião é muito importante! <br>
			</span>
				<p class="white-text">Ajude a melhorar o transporte escolar de nossa cidade.</p>
		</h4>
		<br>
		<br>

		<div class="center">
			<a href="/contato" 
			class="waves-effect waves-light btn btn-large center-align">
				<i class="material-icons right">send</i> Deixe aqui sua sugestão
			</a>
		</div>


	</div>
</div>

<!-- / dê a sua sugestão -->
