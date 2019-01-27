@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Adicionar Escola</h2>
        <p class="text-warning">Adicionando uma Escola para <strong>{{ $membro->nome }}</strong></p>

        {!! Form::open(['route' => 'membros.store-escola', 'class' => 'form', 'files' => true]) !!}

        @include('membros._form-escola')

        {!! Html::openFormGroup() !!}
            {!! Form::submit('Salvar', ['class' => 'btn btn-info']) !!}
        {!! Html::closeFormGroup() !!}

        {!! Form::close() !!}

    </div>
</div>
@endsection
