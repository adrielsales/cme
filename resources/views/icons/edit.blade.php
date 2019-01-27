@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Editar Icon</h2>

        {!! Form::model($icon, [
            'route' => ['icons.update', 'icon' => $icon->id],
            'class' => 'form',
            'method' => 'PUT'
            ])
        !!}

            @include('icons._form')

            <div class="form-group">
                {!! Form::submit('Alterar', ['class' => 'btn btn-info']) !!}
            </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection
