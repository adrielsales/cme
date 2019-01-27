@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Novo Icon</h2>

        {!! Form::open(['route' => 'icons.store', 'class' => 'form']) !!}

            @include('icons._form')

            {!! Html::openFormGroup() !!}
                {!! Form::submit('Salvar', ['class' => 'btn btn-info']) !!}
            {!! Html::closeFormGroup() !!}

        {!! Form::close() !!}

    </div>
</div>
@endsection
