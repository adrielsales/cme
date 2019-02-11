<!DOCTYPE html>
<html>
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111931620-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-111931620-1');
	</script>

	<meta charset="utf-8">
	<title>Conexão Mulheres no Escolar - Transporte Escolar João Pessoa</title>
	<meta Name=”robots” content=”index”>
	<meta name="description" content="Transporte Escolar legalizado em João Pessoa, com profissionais capacitados para lhe oferecer segurança e tranquilidade no trânsito.">
	<meta name="keywords" content="transporte escolar joão pessoa, cmevida, transporte, escolar, grande joão pessoa, amor a vida, consciência no trânsito, responsabilidade no trânsito, trânsito, contratar, transporte escolar legalizado, profissionais capacitados, motoristas, vans escolares, segurança, tranquilidade no trânsito, matrículas, escolas, bairros, serviço transporte escolar, serviço transporte universitário, viagens">

	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<meta property="busca:image" content="" />
	<meta itemprop="name" content="">
	<meta itemprop="url" content="">
	<meta itemprop="image" content="">
	<meta itemprop="description" content="">
	<link rel="canonical" href="http://conexaomulheresnoescolar.com.br/">
	<meta property="og:type" content="website">
	<meta property="og:url" content="http://conexaomulheresnoescolar.com.br/">
	<meta property="og:description"
	                      content="Transporte Escolar legalizado em João Pessoa, com profissionais capacitados para lhe oferecer segurança e tranquilidade no trânsito.">
	<meta property="og:title" content="Conexão Mulheres no Escolar">
	<meta property="og:locale" content="pt_BR">
	<meta property="og:site_name" content="Conexão Mulheres no Escolar">

	{{-- favicons --}}
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-touch-icon.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}">
	<link rel="manifest" href="{{ asset('favicons/manifest.json') }}">
	<link rel="mask-icon" href="{{ asset('favicons/safari-pinned-tab.svg') }}" color="#5bbad5">
	<meta name="theme-color" content="#ffffff">


	<link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300|Source+Serif+Pro" rel="stylesheet">
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Materialize CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('materialize/css/materialize.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/cmevida-site.css') }}">

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.11';
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

</head>
<body>
	<!-- menu start -->
	<div class="navbar-fixed">
		<nav class="yellow darken-1">
			<div class="nav-wrapper container flow-text brand-image">
				<a href="/" class="brand-logo black-text" data-brand="">
					Conexão Mulheres no Escolar
				</a>
				<!-- menu para mobile -->
				<a href="#" data-activates="menu-mobile" class="button-collapse right">
					<i class="material-icons black-text">menu</i>
				</a>

				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li class="active"><a href="/sobre"><span class="black-text font-menu">Sobre</span></a></li>
					<li><a href="/equipe"><span class="black-text font-menu">Equipe</span></a></li>
					<li><a href="/contato"><span class="black-text font-menu">Contatos</span></a></li>
					<li><a href="{{ url('/listaDeNoticias') }}"><span class="black-text font-menu">Notícias</span></a></li>
				</ul>
			</div>
		</nav>
	</div>

	<!-- menu para mobile -->
	<ul id="menu-mobile" class="side-nav pink lighten-3">
		<li class="active"><a href="/sobre"><i class="material-icons">announcement</i> Sobre</a></li>
		<li><a href="/equipe"><i class="material-icons">people</i> Equipe</a></li>
		<li><a href="/contato"><i class="material-icons">contacts</i> Contatos</a></li>
	</ul>
	<!-- /nenu stop -->


	@yield('content')

	<footer class="page-footer pink lighten-3 flow-text">
		<div class="container">
			<div class="row">
				<div class="col m6 s12">
					<h5 class="black-text flow-text">Conexão Mulheres no Escolar</h5>
					<p class="black-text text-lighten-4">Somos a Conexão Mulheres no Escolar e acreditamos que o amor pela sua vida e pela vida daqueles que você ama, requer consciência e responsabilidade no ato de contratar o transporte escolar legalizado, com profissionais capacitados para lhe oferecer segurança e tranquilidade no trânsito.</p>
				</div>
				<div class="col m3 s12">
					<h5 class="black-text">Navegar</h5>
					<ul>
						<li><a class="black-text text-lighten-3" href="/sobre">Sobre nós</a></li>
						<li><a class="black-text text-lighten-3" href="/equipe">Equipe</a></li>
						<li><a class="black-text text-lighten-3" href="/contato">Contatos</a></li>
					</ul>
				</div>
				<div class="col m3 s12">
					<h5 class="black-text">Compartilhar</h5>

					<ul class="index-footer-sharing-page">
						<li>
							<!-- Twitter -->
							<a href="http://twitter.com/share" class="twitter-share-button"
							data-url="www.cmevida.com.br" data-text="Conexão Mulheres no Escolar" data-count="horizontal" data-via="@AdrielJSales" data-lang="pt">Tweetar</a>
							<script type="text/javascript" src="http://platform.twitter.com/widgets.js">
							</script>
							<!-- / Twitter -->
						</li>
						<li>
							<!-- GOOGLE PLUS + -->
							<script src="https://apis.google.com/js/platform.js" async defer>
							  {lang: 'pt-BR'}
							</script>
							<!-- Place this tag where you want the share button to render. -->
							<div class="g-plus" data-action="share" data-height="20"></div>
						</li>
						<li>
							<div class="fb-share-button" data-href="https://cmevida.com.br" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fcmevida.com.br%2F&amp;src=sdkpreparse">Compartilhar</a></div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container">
				© 2017-<span id="ano-atual"></span> Copyright
				<a class="white-text right" href="#!">Desenvolvido por Adriel Sales</a>
				<script>
					data = new Date();
		            ano = data.getFullYear();
		            document.getElementById("ano-atual").innerHTML = ano;
				</script>
			</div>
		</div>
	</footer>

	<!-- Materialize JQuery -->
	<script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
	<!-- Materialize JS -->
	<script type="text/javascript" src="{{ asset('materialize/js/materialize.min.js') }}"></script>

	<script>
		//ativando o botão do menu mobile
		$(".button-collapse").sideNav();

	    //carousel slide home top


	    $('.carousel.carousel-slider').carousel({fullWidth: false});

			// 	    $('.carousel').carousel({
			//     padding: 200
			// });
			autoplay()

			function autoplay() {
				$('.carousel').carousel('next');
				setTimeout(autoplay, 4500);
			}


//select
 $(document).ready(function() {
    $('select').material_select();
  });

 //slides
 $(document).ready(function(){
  $('.slider').slider();
});


 	var options = [
		{
			selector: '#lista-de-escolas', offset: 150, callback: function(el) {
				Materialize.showStaggeredList($(el));
			}
		}
	];

	Materialize.scrollFire(options);

</script>

@yield('post-script')

</body>
</html>
