{{-- <div class="slider"> --}}
{{-- <img class="responsive-img" src="{{ asset('statics_images/diadasmaes2018.png') }}"> --}}
  <div class="row noticias-row-wrapper container"> 

      <div class="col m12">

        {{-- Notícia destaque --}}
        <div class="col m12 s12">
{{-- 
            <div class="row" id="noticia-destaque">
                <div class="col m12">
                  <div class="card">
                    <div class="card-image">
                      <img src="{{ asset('statics_images/exemplo_noticia.jpg') }}">
                        <a href="#">
                          <span class="card-title" style="background-color: rgba(236,64,122,0.5); width: 100%;">
                              <h1 class="titulo_destaque flow-text">Prazos para pagamento do IPVA e comprovação de isenção de placa com final 1 vão até 31 de janeiro.</h1>
                            </span>
                        </a>
                    </div>
                    <div class="card-content pink darken-4">
                      <h5>Aqui entra o título da notícia que preciso ver o tamanho máximo de caracteres.</h5>
                    </div>
                    {{-- <div class="card-action">
                      <a href="#">This is a link</a>
                    </div> 
                  </div>
                </div>
              </div> --}}


              <div class="slider">
                <ul class="slides">
                  <li>
                    <img src="{{ asset('statics_images/exemplo_noticia.jpg') }}"> <!-- random image -->
                    <div class="caption left-align">
                      <h3 style="text-shadow: 0.1em 0.1em 0.05em #333;">Aviso importante!</h3>
                      <h5 class="light grey-text text-lighten-3 slides-subtitulos" style="text-shadow: 0.1em 0.1em 0.05em #333;">
                        Prazos para pagamento do IPVA e comprovação de isenção de placa com final 1 vão até 31 de janeiro.
                      </h5>
                    </div>
                  </li>
                  <li>
                    <img src="https://lorempixel.com/580/250/nature/2"> <!-- random image -->
                    <div class="caption left-align">
                      <h3>Left Aligned Caption</h3>
                      <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                    </div>
                  </li>
                  <li>
                    <img src="https://lorempixel.com/580/250/nature/3"> <!-- random image -->
                    <div class="caption right-align">
                      <h3>Right Aligned Caption</h3>
                      <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                    </div>
                  </li>
                  <li>
                    <img src="https://lorempixel.com/580/250/nature/4"> <!-- random image -->
                    <div class="caption center-align">
                      <h3>This is our big Tagline!</h3>
                      <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                    </div>
                  </li>
                </ul>
              </div>








        </div>
        {{-- /Notícia destaque --}}

        
        {{-- Notícias pequenas --}}
        <div class="col m4 s12">



            <ul class="collection">
                <li class="collection-item avatar">
                  <img src="images/yuna.jpg" alt="" class="circle">
                  <span class="title">Title</span>
                  <p>First Line <br>
                     Second Line
                  </p>
                  <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                </li>
                <li class="collection-item avatar">
                  <i class="material-icons circle">folder</i>
                  <span class="title">Title</span>
                  <p>First Line <br>
                     Second Line
                  </p>
                  <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                </li>
                <li class="collection-item avatar">
                  <i class="material-icons circle green">insert_chart</i>
                  <span class="title">Title</span>
                  <p>First Line <br>
                     Second Line
                  </p>
                  <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                </li>
                <li class="collection-item avatar">
                  <i class="material-icons circle red">play_arrow</i>
                  <span class="title">Title</span>
                  <p>First Line <br>
                     Second Line
                  </p>
                  <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                </li>
              </ul>















            {{-- <div class="row" style="margin-bottom: 5px;">
                <div class="col m12">
                  <div class="card">
                    <div class="card-image">
                      <img src="{{ asset('statics_images/exemplo_noticia.jpg') }}">
                      <a href="#">
                          <span class="card-title" style="background-color: rgba(236,64,122,0.5); width: 100%;">
                              <h5 class="titulos_noticias_ao_lado_do_destaque flow-text">Prazos para pagamento do IPVA e comprovação de isenção de placa com final 1 vão até 31 de janeiro.</h5>
                            </span>
                        </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row" style="margin-bottom: 5px;">
                <div class="col s12 m12">
                  <div class="card">
                    <div class="card-image">
                      <img src="{{ asset('statics_images/exemplo_noticia.jpg') }}">
                      <a href="#">
                          <span class="card-title" style="background-color: rgba(236,64,122,0.5); width: 100%;">
                              <span class="titulos_noticias_ao_lado_do_destaque flow-text">Prazos para pagamento do IPVA e comprovação de isenção de placa com final 1 vão até 31 de janeiro.</span>
                            </span>
                        </a>
                    </div>
                  </div>
                </div>
              </div>              --}}

        </div>
        {{-- /Notícias pequenas --}}

      </div>

    </div>


    {{-- <div class="slider">
      <ul class="slides">
        @forelse($banners as $banner)
        <li>
          <img src="{{ asset($banner->imagem) }}">
          <div class="caption center-align">
            @if($banner->exibirTitulos)
							<div class="background-titulos-slide">
								<h3>{{ $banner->titulo }}</h1>
									<h4>
										{!! $banner->sub_titulo !!}
									</h4>
							</div>
            @endif
          </div>
        </li>
        @empty
        <p>Sem imagens para o Carrousel</p>
        @endforelse
      </ul>
    </div>
  </div> --}}
