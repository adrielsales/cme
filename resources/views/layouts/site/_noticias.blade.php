<div class="slider">
{{-- <img class="responsive-img" src="{{ asset('statics_images/diadasmaes2018.png') }}">
  <div class="row" style="margin-top:5px;"> --}}

    <div class="row">

      <div class="col m12">

        {{-- Notícia destaque --}}
        <div class="col m8">

            <div class="row">
                <div class="col s12 m12">
                  <div class="card">
                    <div class="card-image">
                      <img src="{{ asset('statics_images/exemplo_noticia.jpg') }}">
                        <a href="#">
                          <span class="card-title" style="background-color: rgba(0,0,0,0.5); width: 100%;">
                              Aqui entra o título da notícia que preciso ver o tamanho máximo de caracteres.
                            </span>
                        </a>
                    </div>
                    {{-- <div class="card-content pink darken-4">
                      <h5>Aqui entra o título da notícia que preciso ver o tamanho máximo de caracteres.</h5>
                    </div> --}}
                    {{-- <div class="card-action">
                      <a href="#">This is a link</a>
                    </div> --}}
                  </div>
                </div>
              </div>

        </div>
        {{-- /Notícia destaque --}}

        
        {{-- Notícias pequenas --}}
        <div class="col m4">

            <div class="row" style="margin-bottom: 5px;">
                <div class="col s12 m12">
                  <div class="card">
                    <div class="card-image">
                      <img src="{{ asset('statics_images/exemplo_noticia.jpg') }}">
                      <a href="#">
                          <span class="card-title" style="background-color: rgba(0,0,0,0.8); width: 100%;">
                              <h5> Aqui entra o título da notícia que preciso ver o tamanho máximo de caracteres.</h5>
                            </span>
                        </a>
                      {{-- <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a> --}}
                    </div>
                    {{-- <div class="card-content">
                      <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                    </div> --}}
                  </div>
                </div>
              </div>

              <div class="row" style="margin-bottom: 5px;">
                <div class="col s12 m12">
                  <div class="card">
                    <div class="card-image">
                      <img src="{{ asset('statics_images/exemplo_noticia.jpg') }}">
                      <a href="#">
                          <span class="card-title" style="background-color: rgba(0,0,0,0.8); width: 100%;">
                              <h5> Aqui entra o título da notícia que preciso ver o tamanho máximo de caracteres.</h5>
                            </span>
                        </a>
                      {{-- <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a> --}}
                    </div>
                    {{-- <div class="card-content">
                      <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                    </div> --}}
                  </div>
                </div>
              </div>             

        </div>
        {{-- /Notícias pequenas --}}

      </div>

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
