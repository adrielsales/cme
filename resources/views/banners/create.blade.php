@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Nova Banner</h2>

        {!! Form::open(['route' => 'banners.store', 'class' => 'form', 'files' => true]) !!}

            @include('banners._form')

            {!! Html::openFormGroup() !!}
                {!! Form::submit('Salvar', ['class' => 'btn btn-info']) !!}
            {!! Html::closeFormGroup() !!}

        {!! Form::close() !!}

    </div>
</div>


{{-- {{phpinfo()}} --}}

@endsection
