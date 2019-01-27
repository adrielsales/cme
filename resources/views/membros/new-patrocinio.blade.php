@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Adicionar Patrocício</h2>
        <p class="text-warning">Adicionando um patrocínio para <strong>{{ $membro->nome }}</strong></p>

        {!! Form::open(['route' => 'membros.store-patrocinio', 'class' => 'form', 'files' => true]) !!}

        @include('membros._form-patrocinio')

        {!! Html::openFormGroup() !!}
            {!! Form::submit('Salvar', ['class' => 'btn btn-info']) !!}
        {!! Html::closeFormGroup() !!}

        {!! Form::close() !!}

    </div>
</div>
@endsection
