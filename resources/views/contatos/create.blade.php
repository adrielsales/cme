@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Novo Contato</h2>

        {!! Form::open(['route' => 'contatos.store', 'class' => 'form']) !!}

            @include('contatos._form')

            {!! Html::openFormGroup() !!}
                {!! Form::submit('Salvar', ['class' => 'btn btn-info']) !!}
            {!! Html::closeFormGroup() !!}

        {!! Form::close() !!}

    </div>
</div>
@endsection
