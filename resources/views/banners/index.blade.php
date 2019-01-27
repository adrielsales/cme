@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <h2>Banners</h2>
        <a href="{{ route('banners.create') }}" class="btn btn-success btn-md">Novo Banner</a>
    </div>
    <div>

      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Banner de Slides</a></li>
        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Banners de Patrocinadores Globais</a></li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th>Título</th>
                        <th>Sub-Título</th>
                        <th>Tipo</th>
                        <th>Exibir Títulos</th>
                        <th>Posição</th>
                        <th>Estado</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $quantidade = 0;
                    @endphp
                    @forelse($banners->where('tipo', '=', 'Slide')->sortBy('posicao') as $banner)
                        @php
                            $quantidade++;
                        @endphp
                        <tr>
                            <td>
                                <img src="{{ $banner->imagem }}" alt="{{ $banner->titulo }}" class="img-thumbnail" width="120">
                            </td>
                            <td>{{ $banner->titulo }}</td>
                            <td>{!! $banner->sub_titulo !!}</td>
                            <td>{{ $banner->tipo }}</td>
                            <td>{{ $banner->exibirTitulos }}</td>
                            <td><span class="badge">{{ $banner->posicao }}</span></td>
                            <td onclick="mudaEstadoBanner('{{$banner->id}}');" id="alterarEstado_{{$banner->id}}">
                                {!! Html::iconeParaEstado($banner->ativo) !!}
                                <button class="btn btn-xs"> Mudar</button>
                            </td>
                            <td>
                                <ul class="list-inline">
                                    <li>
                                        <a href="{{ route('banners.edit', ['banner' => $banner->id]) }}" class="btn btn-default btn-xs">Editar</a>
                                    </li>
                                    <li>
                                        @php $deleteForm = "delete-form-{$loop->index}"; @endphp
                                        <a href="{{ route('banners.destroy',['banner' => $banner->id]) }}" onclick="event.preventDefault();document.getElementById('{{$deleteForm}}').submit()" class="btn btn-danger btn-xs">Excluir</a>
                                        {!! Form::open([
                                            'route' => ['banners.destroy', 'banner' => $banner->id],
                                            'method' => 'DELETE', 'id' => $deleteForm, 'style' => 'display:none']) 
                                        !!}
                                        {!! Form::close() !!}
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @empty
                        <p class="alert alert-warning">Sem itens cadastrados no sistema.</p>
                    @endforelse
                </tbody>
            </table>
            <p class="text-center text-warning">{{ $quantidade }} banners no sistema</p>
            {{ $banners->links() }}
            </table>
        </div>
        <div role="tabpanel" class="tab-pane" id="profile">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th>Título</th>
                        <th>Sub-Título</th>
                        <th>Tipo</th>
                        <th>Posição</th>
                        <th>Estado</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $quantidade = 0;
                    @endphp
                    @forelse($banners->where('tipo', '!=', 'Slide')->sortBy('posicao') as $banner)
                        @php
                            $quantidade++;
                        @endphp
                        <tr>
                            <td><img src="{{ $banner->imagem }}" alt="{{ $banner->titulo }}" class="img-thumbnail" width="120"></td>
                            <td>{{ $banner->titulo }}</td>
                            <td>{!! $banner->sub_titulo !!}</td>
                            <td>{{ $banner->tipo }}</td>
                            <td><span class="badge">{{ $banner->posicao }}</span></td>
                            <td onclick="mudaEstadoBanner('{{$banner->id}}');" id="alterarEstado_{{$banner->id}}">
                                {!! Html::iconeParaEstado($banner->ativo) !!}
                                <button class="btn btn-xs"> Mudar</button>
                            </td>
                            <td>
                                <ul class="list-inline">
                                    <li>
                                        <a href="{{ route('banners.edit', ['banner' => $banner->id]) }}" class="btn btn-default btn-xs">Editar</a>
                                    </li>
                                    <li>
                                        @php $deleteForm = "delete-form-{$loop->index}"; @endphp
                                        <a href="{{ route('banners.destroy',['banner' => $banner->id]) }}" onclick="event.preventDefault();document.getElementById('{{$deleteForm}}').submit()" class="btn btn-danger btn-xs">Excluir</a>
                                        {!! Form::open([
                                            'route' => ['banners.destroy', 'banner' => $banner->id],
                                            'method' => 'DELETE', 'id' => $deleteForm, 'style' => 'display:none']) 
                                        !!}
                                        {!! Form::close() !!}
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @empty
                        <p class="alert alert-warning">Sem itens cadastrados no sistema.</p>
                    @endforelse
                </tbody>
            </table>
            <p class="text-center text-warning">{{ $quantidade }} banners no sistema</p>
            {{ $banners->links() }}
            </table>
        </div>
      </div>

    </div>

    </div>
</div>

@endsection


@section('post-script')
    <script type="text/javascript">

        function mudaEstadoBanner(idDoObjetoQueIraTrocarOEstado){
            $.get('/banners/' + idDoObjetoQueIraTrocarOEstado + '/mudaEstadoBanner', function(novoEstado){
                var htmlParaNovoEstado = "";
                if(novoEstado == 1){
                    htmlParaNovoEstado = '<span style="color:lawngreen" class="glyphicon glyphicon-ok-sign" aria-hidden="true" title="Ativo"></span> <button class="btn btn-xs"> Ativo</button>';
                } else {
                    htmlParaNovoEstado = '<span style="color:salmon" class="glyphicon glyphicon-minus-sign" aria-hidden="true" title="inativo"></span> <button class="btn btn-xs"> Desativado</button>';
                }
                document.getElementById('alterarEstado_'+idDoObjetoQueIraTrocarOEstado).innerHTML = htmlParaNovoEstado;
                //alert(novoEstado);
            });
        }
    </script>
@endsection