@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Membros</h2>
        <a href="{{ route('membros.create') }}" class="btn btn-success btn-md">Novo Membro</a>
        <hr>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>Carro</th>
                    {{-- <th>Endereço</th> --}}
                    {{-- <th>video</th> --}}
                    <th>Estado</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($membros->sortBy('nome') as $membro)
                <tr>
                    <td><img src="{{ $membro->foto }}" alt="{{ $membro->nome }}" class="img-thumbnail" width="120"></td>
										<td>{!! $membro->nome !!}</td>
                    <td>
												@forelse ($membro->carros as $carro)
													<span class="badge" style="font-size: 20px;">{{ $carro->registro_SEMOB }}</span>
												@empty
													Sem carros cadastrados.
												@endforelse
										</td>
                    {{-- <td>{!! $membro->endereco !!}</td> --}}
                    {{-- <td>{{ $membro->url_video }}</td> --}}
                    <td onclick="mudaEstado('{{$membro->id}}');" id="alterarEstado_{{$membro->id}}">
                        {!! Html::iconeParaEstado($membro->ativo) !!}
                        <button class="btn btn-xs"> Mudar</button>
                    </td>
                    <td>
                        <ul class="list-inline">
                            <li>
                                <a href="{{ route('membros.show', ['membro' => $membro->id]) }}" class="btn btn-info btn-xs">Detalhes</a>
                            </li>
                            <li>
                                <a href="{{ route('membros.edit', ['membro' => $membro->id]) }}" class="btn btn-default btn-xs">Editar</a>
                            </li>
                            <li>
                                @php $deleteForm = "delete-form-{$loop->index}"; @endphp
                                <a href="{{ route('membros.destroy',['membro' => $membro->id]) }}" onclick="event.preventDefault();document.getElementById('{{$deleteForm}}').submit()" class="btn btn-danger btn-xs">Excluir</a>
                                {!! Form::open([
                                    'route' => ['membros.destroy', 'membro' => $membro->id],
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
        <p class="text-center text-warning">{{ count($todosOsMembrosNoSistema) }} membros cadastradas no sistema</p>
        {{ $membros->links() }}
    </div>
</div>

@endsection


@section('post-script')
    <script type="text/javascript">

        function mudaEstado(idDoObjetoQueIraTrocarOEstado){
            $.get('/membros/' + idDoObjetoQueIraTrocarOEstado + '/mudaEstado', function(novoEstado){
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
