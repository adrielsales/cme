@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Icons</h2>
        <a href="{{ route('icons.create') }}" class="btn btn-success btn-md">Novo Icon</a>
        <hr>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Icon</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($icons as $icon)
                <tr>
                    <td>{{ str_pad($icon->id, 3, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $icon->nome }}</td>
                    <td><i class="{!! $icon->icon !!}" style="font-size: 20px;"></i></td>
                    <td>
                        <ul class="list-inline">
                            <li>
                                <a href="{{ route('icons.edit', ['icon' => $icon->id]) }}" class="btn btn-default btn-xs">Editar</a>
                            </li>
                            <li>
                                @php $deleteForm = "delete-form-{$loop->index}"; @endphp
                                <a href="{{ route('icons.destroy',['icon' => $icon->id]) }}" onclick="event.preventDefault();document.getElementById('{{$deleteForm}}').submit()" class="btn btn-danger btn-xs">Excluir</a>
                                {!! Form::open([
                                    'route' => ['icons.destroy', 'icon' => $icon->id],
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
        <p class="text-center text-warning">{{ count($icons) }} Icons no sistema</p>
        {{ $icons->links() }}
    </div>
</div>

@endsection