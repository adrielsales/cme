@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Acompanhantes</h2>
        <hr>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Alvará</th>
                    <th>Nome</th>
                    <th>Permissionária</th>
                    <th>Estado</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($acompanhantes->sortBy('nome') as $acompanhante)
                <tr>
                    <td>
											@if (empty($acompanhante->alvara_SEMOB))
												sem imagem
											@else
												<img src="{{ $acompanhante->alvara_SEMOB }}" alt="{{ $acompanhante->nome }}" class="img-thumbnail" width="100"></td>
											@endif
                    <td>{{ $acompanhante->nome }}</td>
                    <td>{!! $acompanhante->membro->nome !!}</td>
                    <td onclick="mudaEstado('{{$acompanhante->id}}');" id="alterarEstado_{{$acompanhante->id}}">
                        {!! Html::iconeParaEstado($acompanhante->ativo) !!}
                        <button class="btn btn-xs"> Mudar</button>
                    </td>
                    <td>
                        <ul class="list-inline">
                            <li>
                                <a href="{{ route('acompanhantes.edit', ['acompanhante' => $acompanhante->id]) }}" class="btn btn-default btn-xs">Editar</a>
                            </li>
                            <li>
                                @php $deleteForm = "delete-form-{$loop->index}"; @endphp
                                <a href="{{ route('acompanhantes.destroy',['acompanhante' => $acompanhante->id]) }}" onclick="event.preventDefault();document.getElementById('{{$deleteForm}}').submit()" class="btn btn-danger btn-xs">Excluir</a>
                                {!! Form::open([
                                    'route' => ['acompanhantes.destroy', 'acompanhante' => $acompanhante->id],
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
        <p class="text-center text-warning">{{ count($totalDeAcompanhantes) }} no sistema</p>
        {{ $acompanhantes->links() }}
    </div>
</div>

@endsection


@section('post-script')
    <script type="text/javascript">

        function mudaEstado(idDoObjetoQueIraTrocarOEstado){
            $.get('/acompanhantes/' + idDoObjetoQueIraTrocarOEstado + '/mudaEstado', function(novoEstado){
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
