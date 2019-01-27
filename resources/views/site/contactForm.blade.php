@extends('layouts.site')

@section('content')

<!-- content -->
<div class="card-painel card-panel-espacamento">
	<div class="container">
		<div class="titulo-contato">
			<h4 class="center">Sua opinião é muito importante <br>para melhorar o transporte escolar de nossa cidade</h4>
		</div>

		<div class="row">
		    <form action="{{ url('/message') }}" class="col s12" method="post">

		    	{{ csrf_field() }}

		      <div class="row">
		        <div class="input-field col s12 m4">
		        	<i class="material-icons prefix">account_circle</i>
		          	<input name="remetente" id="remetente" type="text" class="validate">
		          	<label for="remetente">Nome (opcinal)</label>
		        </div>
		        <div class="input-field col s12 m4">
		        	<i class="material-icons prefix">phone</i>
		          	<input name="fone" id="fone" type="text" class="validate">
		          	<label for="fone">Telefone (opcinal)</label>
		        </div>
		        <div class="input-field col s12 m4">
		        	<i class="material-icons prefix">email</i>
			        <input name="email" id="email" type="email" class="validate">
		          	<label for="email">Email (opcinal)</label>
		        </div>
		    </div>
		    <div class="row">
		        <div class="input-field col s12">
		          <textarea name="mensagem" id="mensagem" class="validate materialize-textarea" required="required"></textarea>
		          <label for="mensagem">Mensagem</label>
			    </div>
		    </div>

		    <div class="grey lighten-4" style="padding: 5px;">
			    <p>
			     	<input name="publicar" type="radio" id="publicarSim" value="1" checked="checked" />
				    <label for="publicarSim">PERMITO que minha mensagem seja publicada no site.</label>
				</p>
				<p>
					<input name="publicar" type="radio" id="publicarNao" value="0" />
			      	<label for="publicarNao">NÃO PERMITO que minha mensagem seja publicada no site.</label>
			    </p>
		    </div>


		      <div class="row">
		        <div class="col s12">
		          <div class="input-field inline">
		            <button type="submit" class="btn waves-effect waves-light btn-large"> Enviar Mensagem
						<i class="material-icons right">send</i>
		            </button>
		          </div>
		        </div>
		      </div>
		    </form>
		  </div>

		  <hr>

		 <h5>Outros Canais de Comunicação:</h5>

		 <p><b>Email:</b> contato@cmevida.com.br</p>

		 <p>
		 	Visite nossa página no facebook:
		 </p>

		 {{-- Facebook --}}
		<div class="fb-page" data-href="https://www.facebook.com/CMEVIDA/" data-tabs="timeline" data-height="180" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/CMEVIDA/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/CMEVIDA/">CME - Conexão Mulheres no Escolar</a></blockquote></div>
		</iframe>

	</div>
</div>

<!-- / dê a sua sugestão -->

@endsection

@section('post-script')

<script>
	function mensagemSucesso(mensagem){
		var $toastContent = $('<span>' + mensagem + '</span>').add($('<button class="btn-flat toast-action">X</button>'));
	  	Materialize.toast($toastContent, 5000);
	}
</script>
     @if(Session::has('message'))
            <script>
            	mensagemSucesso("{{ session('message') }}");
            </script>
    @endif

@endsection