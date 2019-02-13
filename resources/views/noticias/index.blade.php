@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <h2>Notícias</h2>
        <a href="{{ route('noticias.create') }}" class="btn btn-success btn-md">Nova Notícia</a>
    </div>
    <div>    
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th>Título</th>
                    <th>Sub-Título</th>
                    <th>Destaque</th>
                    <th>Data de Publicação</th>
                    <th>Saída de Destaque</th>
                    <th>Pré-Visualizar</th>
                    <th>Estado</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @php $quantidade = 0; @endphp
                @forelse($noticias->sortBy('id') as $noticia)
                    @php $quantidade++; @endphp
                        <tr>
                            <td>
                                <img src="{{ $noticia->capa }}" alt="{{ $noticia->titulo }}" class="img-thumbnail" width="120">
                            </td>
                            <td>{{ $noticia->titulo }}</td>
                            <td>{!! $noticia->sub_titulo !!}</td>
                            <td onclick="mudaEstadoDestaque('{{$noticia->id}}');" id="alterarDestaque_{{$noticia->id}}">
                                {!! Html::iconeParaEstado($noticia->ativo) !!}
                                <button class="btn btn-xs"> Mudar</button>
                            </td>
                            <td>{{ $noticia->data_para_publicar_destaque }}</td>
                            <td>{{ $noticia->data_de_expiracao_destaque }}</td>

                            <td>
                                {{-- <a href="#" target="_blank">view</a> --}}
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal{{ $noticia->id }}">
                                        ver
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="myModal{{ $noticia->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">{{ $noticia->titulo }}</h4>
                                            <h5 class="modal-title" id="myModalLabel">{{ $noticia->sub_titulo }}</h5>
                                            </div>
                                            <div class="modal-body">
                                                {!! $noticia->texto !!}
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Close</button>
                                            <a href="{{ route('noticias.edit', ['noticia' => $noticia->id]) }}" class="btn btn-default">Editar</a>
                                            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                <!--/ Modal -->

                            </td>

                            <td onclick="mudaEstadonoticia('{{$noticia->id}}');" id="alterarEstado_{{$noticia->id}}">
                                {!! Html::iconeParaEstado($noticia->ativo) !!}
                                <button class="btn btn-xs"> Mudar</button>
                            </td>
                            <td>
                                <ul class="list-inline">
                                    <li>
                                        <a href="{{ route('noticias.edit', ['noticia' => $noticia->id]) }}" class="btn btn-default btn-xs">Editar</a>
                                    </li>
                                    <li>
                                        @php $deleteForm = "delete-form-{$loop->index}"; @endphp
                                        <a href="{{ route('noticias.destroy',['noticia' => $noticia->id]) }}" onclick="event.preventDefault();document.getElementById('{{$deleteForm}}').submit()" class="btn btn-danger btn-xs">Excluir</a>
                                        {!! Form::open([
                                            'route' => ['noticias.destroy', 'noticia' => $noticia->id],
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

            <p class="text-center text-warning">{{ $quantidade }} noticias no sistema</p>
            {{ $noticias->links() }}
    </div>
</div>

@endsection


@section('post-script')
    <script type="text/javascript">

        function mudaEstadonoticia(idDoObjetoQueIraTrocarOEstado){
            //console.log(idDoObjetoQueIraTrocarOEstado);
            $.get('/noticias/' + idDoObjetoQueIraTrocarOEstado + '/mudaEstadoNoticia', function(novoEstado){
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

        function mudaEstadoDestaque(idDoObjetoQueIraTrocarOEstado){
            //console.log(idDoObjetoQueIraTrocarOEstado);
            $.get('/noticias/' + idDoObjetoQueIraTrocarOEstado + '/mudaEstadoDestaque', function(novoEstado){
                var htmlParaNovoEstado = "";
                if(novoEstado == 1){
                    htmlParaNovoEstado = '<span style="color:lawngreen" class="glyphicon glyphicon-ok-sign" aria-hidden="true" title="Ativo"></span> <button class="btn btn-xs"> Ativo</button>';
                } else {
                    htmlParaNovoEstado = '<span style="color:salmon" class="glyphicon glyphicon-minus-sign" aria-hidden="true" title="inativo"></span> <button class="btn btn-xs"> Desativado</button>';
                }
                document.getElementById('alterarDestaque_'+idDoObjetoQueIraTrocarOEstado).innerHTML = htmlParaNovoEstado;
                //alert(novoEstado);
            });
        }


    </script>
@endsection