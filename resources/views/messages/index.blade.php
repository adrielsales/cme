@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>messages</h2>
        {{-- <a href="{{ route('messages.create') }}" class="btn btn-success btn-md">Novo message</a> --}}
        <hr>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Data</th>
                    <th>Remetente</th>
                    <th>E-mail</th>
                    <th>Fone</th>
                    <th>Mensagem</th>
                    <th>Publicado</th>
                    <th>Ativo</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $message)
                <tr>
                    <td>{{ $message->id }}</td>
                    <td>{{ date('d/m/Y', strtotime($message->created_at)) }}</td>
                    <td>{{ $message->remetente }}</td>
                    <td>
                        @if (empty($message->email))
                            <i style="color: coral">Não informado</i>
                        @else
                            {{$message->email}}
                        @endif
                    </td>
                    <td>
                        @if (empty($message->fone))
                            <i style="color: coral">Não informado</i>
                        @else
                            {{$message->fone}}
                        @endif
                    </td>
                    <td>{{ $message->mensagem }}</td>
                    
                    <td onclick="mudaEstadoPublicado('{{$message->id}}');" id="alterarPublicado_{{$message->id}}">
                        {!! Html::iconeParaEstado($message->publicar) !!}
                        <button class="btn btn-xs"> Mudar</button>
                    </td>

                    <td onclick="mudaEstadoAtivo('{{$message->id}}');" id="alterarAtivo_{{$message->id}}">
                        {!! Html::iconeParaEstado($message->ativo) !!}
                        <button class="btn btn-xs"> Mudar</button>
                    </td>

                </tr>
                @empty
                    <p class="alert alert-warning">Sem itens cadastrados no sistema.</p>
                @endforelse
            </tbody>
        </table>
        <p class="text-center text-warning">{{ count($messages) }} messages no sistema</p>
        {{ $messages->links() }}
    </div>
</div>

@endsection


@section('post-script')
    <script type="text/javascript">

        function mudaEstadoPublicado(idDoObjetoQueIraTrocarOEstado){
            //console.log(idDoObjetoQueIraTrocarOEstado);
            $.get('/messages/' + idDoObjetoQueIraTrocarOEstado + '/mudaEstadoPublicado', function(novoEstado){
                var htmlParaNovoEstado = "";
                if(novoEstado == 1){
                    htmlParaNovoEstado = '<span style="color:lawngreen" class="glyphicon glyphicon-ok-sign" aria-hidden="true" title="Ativo"></span> <button class="btn btn-xs"> Ativo</button>';
                } else {
                    htmlParaNovoEstado = '<span style="color:salmon" class="glyphicon glyphicon-minus-sign" aria-hidden="true" title="inativo"></span> <button class="btn btn-xs"> Desativado</button>';
                }
                document.getElementById('alterarPublicado_'+idDoObjetoQueIraTrocarOEstado).innerHTML = htmlParaNovoEstado;
                //alert(novoEstado);
            });
        }

        function mudaEstadoAtivo(idDoObjetoQueIraTrocarOEstado){
            //console.log(idDoObjetoQueIraTrocarOEstado);
            $.get('/messages/' + idDoObjetoQueIraTrocarOEstado + '/mudaEstadoAtivo', function(novoEstado){
                var htmlParaNovoEstado = "";
                if(novoEstado == 1){
                    htmlParaNovoEstado = '<span style="color:lawngreen" class="glyphicon glyphicon-ok-sign" aria-hidden="true" title="Ativo"></span> <button class="btn btn-xs"> Ativo</button>';
                } else {
                    htmlParaNovoEstado = '<span style="color:salmon" class="glyphicon glyphicon-minus-sign" aria-hidden="true" title="inativo"></span> <button class="btn btn-xs"> Desativado</button>';
                }
                document.getElementById('alterarAtivo_'+idDoObjetoQueIraTrocarOEstado).innerHTML = htmlParaNovoEstado;
                //alert(novoEstado);
            });
        }


    </script>
@endsection