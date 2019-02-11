 <div class="row noticias-row-wrapper container"> 
        {{-- Notícia destaque --}}
        <div class="col m12 s12">
              <div class="slider">
                <ul class="slides">
                  @forelse($noticias as $noticia)
                    <li>
                      <a href="{{ route('sites.show-noticia', ['id' => $noticia->id]) }}">
                      <img src="{{ asset($noticia->capa) }}">
                      <div class="caption lef-align">
                        {{-- @if($noticia->exibirTitulos) --}}
                        <div class="background-titulos-slide">
                          <h3 style="text-shadow: 0.1em 0.1em 0.05em #333;">{{ $noticia->titulo }}</h3>
                          <h5 class="light grey-text text-lighten-3 slides-subtitulos" style="text-shadow: 0.1em 0.1em 0.05em #333;">
                            {!! $noticia->sub_titulo !!}
                          </h5>
                        </div>
                        {{-- @endif --}}
                      </div>
                    </a>
                  </li>
                  @empty
                    <p>Sem notícias cadastradas.</p>
                  @endforelse
                </ul>
              </div>
        </div>
        {{-- /Notícia destaque --}}
    </div>
