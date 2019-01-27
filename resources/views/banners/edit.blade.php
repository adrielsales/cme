@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Editar Banner</h2>

        {!! Form::model($banner, [
            'route' => ['banners.update', 'banner' => $banner->id],
            'class' => 'form',
            'method' => 'PUT',
            'files' => true
            ])
        !!}

            @include('banners._form')

            <div class="form-group">
                {!! Form::submit('Alterar', ['class' => 'btn btn-info']) !!}
            </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection
