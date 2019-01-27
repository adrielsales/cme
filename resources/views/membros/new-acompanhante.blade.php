@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Adicionar Acompanhante</h2>
        <p class="text-warning">Adicionando um acompanhate para <strong>{{ $membro->nome }}</strong></p>

        {!! Form::open(['route' => 'membros.store-acompanhante', 'class' => 'form', 'files' => true]) !!}

        @include('membros._form-acompanhante')

        {!! Html::openFormGroup() !!}
            {!! Form::submit('Salvar', ['class' => 'btn btn-info']) !!}
        {!! Html::closeFormGroup() !!}

        {!! Form::close() !!}

    </div>
</div>
@endsection
