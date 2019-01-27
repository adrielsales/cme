@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Nova Escola</h2>

        {!! Form::open(['route' => 'escolas.store', 'class' => 'form', 'files' => true]) !!}

            @include('escolas._form')

            {!! Html::openFormGroup() !!}
                {!! Form::submit('Salvar', ['class' => 'btn btn-info']) !!}
            {!! Html::closeFormGroup() !!}

        {!! Form::close() !!}

    </div>
</div>


{{-- {{phpinfo()}} --}}

@endsection
