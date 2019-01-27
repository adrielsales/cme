@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Novo Bairro</h2>

        {!! Form::open(['route' => 'bairros.store', 'class' => 'form']) !!}

            @include('bairros._form')

            {!! Html::openFormGroup() !!}
                {!! Form::submit('Salvar', ['class' => 'btn btn-info']) !!}
            {!! Html::closeFormGroup() !!}

        {!! Form::close() !!}

    </div>
</div>
@endsection
