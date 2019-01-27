@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Novo Carro</h2>

        {!! Form::open(['route' => 'carros.store', 'class' => 'form', 'files' => true]) !!}

            @include('carros._form')

            {!! Html::openFormGroup() !!}
                {!! Form::submit('Salvar', ['class' => 'btn btn-info']) !!}
            {!! Html::closeFormGroup() !!}

        {!! Form::close() !!}

    </div>
</div>
@endsection
