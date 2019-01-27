@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Escolas</h2>
        <a href="{{ route('escolas.create') }}" class="btn btn-success btn-md">Nova Escola</a>
        <hr>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Logomarca</th>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Estado</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($escolas->sortBy('nome') as $escola)
                <tr>
                    <td><img src="{{ $escola->logomarca }}" alt="{{ $escola->nome }}" class="img-thumbnail" width="100"></td>
                    <td>{{ $escola->nome }}</td>
                    <td>{!! $escola->endereco !!}</td>
                    <td onclick="mudaEstado('{{$escola->id}}');" id="alterarEstado_{{$escola->id}}">
                        {!! Html::iconeParaEstado($escola->ativo) !!}
                        <button class="btn btn-xs"> Mudar</button>
                    </td>
                    <td>
                        <ul class="list-inline">
                            <li>
                                <a href="{{ route('escolas.edit', ['escola' => $escola->id]) }}" class="btn btn-default btn-xs">Editar</a>
                            </li>
                            <li>
                                @php $deleteForm = "delete-form-{$loop->index}"; @endphp
                                <a href="{{ route('escolas.destroy',['escola' => $escola->id]) }}" onclick="event.preventDefault();document.getElementById('{{$deleteForm}}').submit()" class="btn btn-danger btn-xs">Excluir</a>
                                {!! Form::open([
                                    'route' => ['escolas.destroy', 'escola' => $escola->id],
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
        <p class="text-center text-warning">{{ count($escolas) }} Escolas no sistema</p>
        {{ $escolas->links() }}
    </div>
</div>

@endsection


@section('post-script')
    <script type="text/javascript">

        function mudaEstado(idDoObjetoQueIraTrocarOEstado){
            $.get('/escolas/' + idDoObjetoQueIraTrocarOEstado + '/mudaEstado', function(novoEstado){
                var htmlParaNovoEstado = "";
                if(novoEstado == 1){
                    htmlParaNovoEstado = '<span style="color:lawngreen" class="glyphicon glyphicon-ok-sign" aria-hidden="true" title="Ativo"></span> <button class="btn btn-xs"> Alterar</button>';
                } else {
                    htmlParaNovoEstado = '<span style="color:salmon" class="glyphicon glyphicon-minus-sign" aria-hidden="true" title="inativo"></span> <button class="btn btn-xs"> Alterar</button>';
                }
                document.getElementById('alterarEstado_'+idDoObjetoQueIraTrocarOEstado).innerHTML = htmlParaNovoEstado;
                //alert(novoEstado);
            });
        }
    </script>
@endsection
