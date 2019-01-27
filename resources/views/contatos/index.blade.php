@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Contatos</h2>
        <a href="{{ route('contatos.create') }}" class="btn btn-success btn-md">Novo Contato</a>
        <hr>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tipo</th>
                    <th>Icon</th>
                    <th>Contato</th>
                    <th>Público</th>
                    <th>Estado</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contatos as $contato)
                <tr>
                    <td>{{ str_pad($contato->id, 3, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $contato->tipo }}</td>
                    <td>{!! $contato->icon !!}</td>
                    <td>{!! $contato->contato !!}</td>
                    <td>{{ $contato->publico }}</td>
                    <td onclick="mudaEstado('{{$contato->id}}');" id="alterarEstado_{{$contato->id}}">
                        {!! Html::iconeParaEstado($contato->ativo) !!}
                        <button class="btn btn-xs"> Mudar</button>
                    </td>
                    <td>
                        <ul class="list-inline">
                            <li>
                                <a href="{{ route('contatos.edit', ['contato' => $contato->id]) }}" class="btn btn-default btn-xs">Editar</a>
                            </li>
                            <li>
                                @php $deleteForm = "delete-form-{$loop->index}"; @endphp
                                <a href="{{ route('contatos.destroy',['contato' => $contato->id]) }}" onclick="event.preventDefault();document.getElementById('{{$deleteForm}}').submit()" class="btn btn-danger btn-xs">Excluir</a>
                                {!! Form::open([
                                    'route' => ['contatos.destroy', 'contato' => $contato->id],
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
        <p class="text-center text-warning">{{ count($contatos) }} Contatos cadastradas no sistema</p>
        {{ $contatos->links() }}
    </div>
</div>

@endsection


@section('post-script')
    <script type="text/javascript">

        function mudaEstado(idDoObjetoQueIraTrocarOEstado){
            $.get('/contatos/' + idDoObjetoQueIraTrocarOEstado + '/mudaEstado', function(novoEstado){
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