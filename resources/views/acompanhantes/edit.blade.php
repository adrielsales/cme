@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Editar Acompanhante</h2>

        {!! Form::model($acompanhante, [
            'route' => ['acompanhantes.update', 'acompanhante' => $acompanhante->id],
            'class' => 'form',
            'method' => 'PUT',
            'files' => true
            ])
        !!}

            @include('acompanhantes._form')

            <div class="form-group">
                {!! Form::submit('Alterar', ['class' => 'btn btn-info']) !!}
            </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection
