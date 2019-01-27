@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Editar Bairro</h2>

        {!! Form::model($bairro, [
            'route' => ['bairros.update', 'bairro' => $bairro->id],
            'class' => 'form',
            'method' => 'PUT'
            ])
        !!}

            @include('bairros._form')

            <div class="form-group">
                {!! Form::submit('Alterar', ['class' => 'btn btn-info']) !!}
            </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection
