@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Carros</h2>
        <a href="{{ route('carros.create') }}" class="btn btn-success btn-md">Novo Carro</a>
        <hr>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Registro</th>
                    <th>Proprietário</th>
                    <th>Descrição</th>
                    <th>Estado</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($carros->sortBy('registro_SEMOB') as $carro)
                <tr>
                    <td><span class="badge" style="font-size: 20px;">{{ $carro->registro_SEMOB }}</span></td>
                    <td>{!! $carro->membro->nome !!}</td>
                    <td>{!! $carro->descricao !!}</td>
                    <td onclick="mudaEstado('{{$carro->id}}');" id="alterarEstado_{{$carro->id}}">
                        {!! Html::iconeParaEstado($carro->ativo) !!}
                        <button class="btn btn-xs"> Mudar</button>
                    </td>
                    <td>
                        <ul class="list-inline">
                            <li>
                                <a href="{{ route('carros.show', ['carro' => $carro->id]) }}" class="btn btn-info btn-xs">Detalhes</a>
                            </li>
                            <li>
                                <a href="{{ route('carros.edit', ['carro' => $carro->id]) }}" class="btn btn-default btn-xs">Editar</a>
                            </li>
                            <li>
                                @php $deleteForm = "delete-form-{$loop->index}"; @endphp
                                <a href="{{ route('carros.destroy',['carro' => $carro->id]) }}" onclick="event.preventDefault();document.getElementById('{{$deleteForm}}').submit()" class="btn btn-danger btn-xs">Excluir</a>
                                {!! Form::open([
                                    'route' => ['carros.destroy', 'carro' => $carro->id],
                                    'method' => 'DELETE', 'id' => $deleteForm, 'style' => 'display:none']) 
                                !!}
                                {!! Form::close() !!}
                            </li>
                        </ul>
                    </td>
                </tr>
                @empty
                    <p class="alert alert-warning">Sem itens cadastrador no sistema.</p>
                @endforelse
            </tbody>
        </table>
        <p class="text-center text-warning">{{ count($carros) }} Carros cadastradas no sistema</p>
        {{ $carros->links() }}
    </div>
</div>

@endsection


@section('post-script')
    <script type="text/javascript">

        function mudaEstado(idDoObjetoQueIraTrocarOEstado){
            $.get('/carros/' + idDoObjetoQueIraTrocarOEstado + '/mudaEstado', function(novoEstado){
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