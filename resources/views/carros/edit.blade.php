@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Editar Carro</h2>

        {!! Form::model($carro, [
            'route' => ['carros.update', 'carro' => $carro->id],
            'class' => 'form',
            'method' => 'PUT',
            'files' => true
            ])
        !!}

            @include('carros._form')

            <div class="form-group">
                {!! Form::submit('Alterar', ['class' => 'btn btn-info']) !!}
            </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection
