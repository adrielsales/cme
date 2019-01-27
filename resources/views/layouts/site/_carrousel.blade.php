{{-- <img class="responsive-img" src="{{ asset('statics_images/diadasmaes2018.png') }}">
  <div class="row" style="margin-top:5px;"> --}}



    <div class="slider">
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
  </div>
