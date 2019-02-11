@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Editar Notícia</h2>

        {!! Form::model($noticia, [
            'route' => ['noticias.update', 'noticia' => $noticia->id],
            'class' => 'form',
            'method' => 'PUT',
            'files' => true
            ])
        !!}

            @include('noticias._form')

            <div class="form-group">
                {!! Form::submit('Alterar', ['class' => 'btn btn-info']) !!}
            </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection
