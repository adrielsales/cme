@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Novo Membro</h2>

        {!! Form::open(['route' => 'membros.store', 'class' => 'form', 'files' => true]) !!}

            @include('membros._form')

            {!! Html::openFormGroup() !!}
                {!! Form::submit('Salvar', ['class' => 'btn btn-info']) !!}
            {!! Html::closeFormGroup() !!}

        {!! Form::close() !!}

    </div>
</div>
@endsection
