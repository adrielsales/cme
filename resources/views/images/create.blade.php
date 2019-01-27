@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Adicionar imagens/panfletos para um Carro</h2>

        @if(Session::has('message_error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session('message_error') }}
            </div>
        @endif

        {!! Form::open(['route' => 'images.store', 'class' => 'form', 'files' => true]) !!}

            @include('images._form')

            {!! Html::openFormGroup() !!}
                {!! Form::submit('Salvar', ['class' => 'btn btn-info']) !!}
            {!! Html::closeFormGroup() !!}

        {!! Form::close() !!}

    </div>
</div>


{{-- {{phpinfo()}} --}}

@endsection
