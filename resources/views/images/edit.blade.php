extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Editar Escola</h2>

        {!! Form::model($escola, [
            'route' => ['escolas.update', 'escola' => $escola->id],
            'class' => 'form',
            'method' => 'PUT',
            'files' => true
            ])
        !!}

            @include('escolas._form')

            <div class="form-group">
                {!! Form::submit('Alterar', ['class' => 'btn btn-info']) !!}
            </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection
