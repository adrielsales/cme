@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Adicionar Contato</h2>
        <p class="text-warning">Adicionando um contato para <strong>{{ $membro->nome }}</strong></p>

        {!! Form::open(['route' => 'membros.store-contato', 'class' => 'form', 'files' => true]) !!}

        @include('membros._form-contato')

        {!! Html::openFormGroup() !!}
            {!! Form::submit('Salvar', ['class' => 'btn btn-info']) !!}
        {!! Html::closeFormGroup() !!}

        {!! Form::close() !!}

    </div>
</div>
@endsection
