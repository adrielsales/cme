@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Nova Notícia</h2>

        {!! Form::open(['route' => 'noticias.store', 'class' => 'form', 'files' => true]) !!}

            @include('noticias._form')

            {!! Html::openFormGroup() !!}
                {!! Form::submit('Salvar', ['class' => 'btn btn-info']) !!}
            {!! Html::closeFormGroup() !!}

        {!! Form::close() !!}

    </div>
</div>

@endsection
