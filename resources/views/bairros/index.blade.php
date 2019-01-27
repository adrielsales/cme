@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Bairros</h2>
        <a href="{{ route('bairros.create') }}" class="btn btn-success btn-md">Novo bairro</a>
        <hr>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Cidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bairros->sortBy('nome') as $bairro)
                <tr>
                    <td>{{ str_pad($bairro->id, 3, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $bairro->nome }}</td>
                    <td>{{ $bairro->cidade }}</td>
                    <td>
                        <ul class="list-inline">
                            <li>
                                <a href="{{ route('bairros.edit', ['bairro' => $bairro->id]) }}" class="btn btn-default btn-xs">Editar</a>
                            </li>
                            <li>
                                @php $deleteForm = "delete-form-{$loop->index}"; @endphp
                                <a href="{{ route('bairros.destroy',['bairro' => $bairro->id]) }}" onclick="event.preventDefault();document.getElementById('{{$deleteForm}}').submit()" class="btn btn-danger btn-xs">Excluir</a>
                                {!! Form::open([
                                    'route' => ['bairros.destroy', 'bairro' => $bairro->id],
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
        <p class="text-center text-warning">{{ count($bairros) }} Bairros no sistema</p>
        {{ $bairros->links() }}
    </div>
</div>

@endsection