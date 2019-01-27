@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Editar Contato</h2>

        {!! Form::model($contato, [
            'route' => ['contatos.update', 'contato' => $contato->id],
            'class' => 'form',
            'method' => 'PUT'
            ])
        !!}

            @include('contatos._form')

            <div class="form-group">
                {!! Form::submit('Alterar', ['class' => 'btn btn-info']) !!}
            </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection
