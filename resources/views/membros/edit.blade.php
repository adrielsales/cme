@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Editar Membro</h2>

        {!! Form::model($membro, [
            'route' => ['membros.update', 'membro' => $membro->id],
            'class' => 'form',
            'method' => 'PUT',
            'files' => true
            ])
        !!}

            @include('membros._form')

            <div class="form-group">
                {!! Form::submit('Alterar', ['class' => 'btn btn-info']) !!}
            </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection
