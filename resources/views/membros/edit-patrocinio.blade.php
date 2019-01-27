@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Editar Patrocínio</h2>

        {!! Form::model($patrocinio, [
            'route' => ['membros.update-patrocinio', 'patrocinio' => $patrocinio->id],
            'class' => 'form',
            'method' => 'PUT',
            'files' => true
            ])
        !!}

            @include('membros._form-patrocinio')

            <div class="form-group">
                {!! Form::submit('Alterar', ['class' => 'btn btn-info']) !!}
            </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection
