@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Área Administrativa</div>

                <div class="panel-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Sistema de Gerenciamento do CMEVida
                    <div style="width: 400px; margin: 0 auto;">
                        <img src="{{ asset('statics_images/logo.png') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
