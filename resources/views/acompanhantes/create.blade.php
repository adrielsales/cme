@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h3>Adicionar Acompanhante a Permissionária</h3>
				<div class="alert alert-warning">
					<p>{{ $membro->nome }}</p>
				</div>

        {!! Form::open(['route' => 'acompanhantes.store', 'class' => 'form', 'files' => true]) !!}

            @include('acompanhantes._form')

            {!! Html::openFormGroup() !!}
                {!! Form::submit('Salvar', ['class' => 'btn btn-info']) !!}
            {!! Html::closeFormGroup() !!}

        {!! Form::close() !!}

    </div>
</div>

@endsection
