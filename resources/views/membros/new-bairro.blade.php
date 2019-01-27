@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Adicionar Bairro</h2>
        <p class="text-warning">Adicionando um Bairro para <strong>{{ $membro->nome }}</strong></p>

        {!! Form::open(['route' => 'membros.store-bairro', 'class' => 'form', 'files' => true]) !!}

        @include('membros._form-bairro')

        {!! Html::openFormGroup() !!}
            {!! Form::submit('Salvar', ['class' => 'btn btn-info']) !!}
        {!! Html::closeFormGroup() !!}

        {!! Form::close() !!}

    </div>
</div>
@endsection
