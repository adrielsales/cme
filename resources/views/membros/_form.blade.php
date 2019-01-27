{!! Form::hidden('redirect_to', URL::previous()) !!}

{!! Html::openFormGroup('nome', $errors) !!}
    {!! Form::label('nome', 'Nome', ['class'=>'control-label']) !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
    {!! Form::errorFormField('nome', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('perfil', $errors) !!}
	{!! Form::label('perfil', 'Perfil') !!}
	{!! Form::text('perfil', null, ['class' => 'form-control']) !!}
	{!! Form::errorFormField('perfil', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('url_video', $errors) !!}
    {!! Form::label('url_video', 'Vídeo') !!}
    {!! Form::text('url_video', null, ['class' => 'form-control']) !!}
    {!! Form::errorFormField('url_video', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('certificado', $errors) !!}
    {!! Form::label('certificado', 'Certificado', ['class'=>'control-label']) !!}

    {{-- Usado apenas para a ação de atualizar --}}
    <br>
    @if(isset($membro))
        <img src="{{ asset($membro->certificado) }}" class="img-thumbnail" width="200">
        <input type="hidden" name="certificadoAtual" value="{{$membro->certificado}}">
        <p class="text-warning">Para alterar, escolha uma nova imagem.</p>
    @endif

    {!! Form::file('certificado') !!}
    {!! Form::errorFormField('certificado', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('foto', $errors) !!}
    {!! Form::label('foto', 'Foto', ['class'=>'control-label']) !!}

    {{-- Usado apenas para a ação de atualizar --}}
    <br>
    @if(isset($membro))
        <img src="{{ asset($membro->foto) }}" class="img-thumbnail" width="200">
        <input type="hidden" name="fotoAtual" value="{{$membro->foto}}">
        <p class="text-warning">Para alterar, escolha uma nova imagem.</p>
    @endif

    {!! Form::file('foto') !!}
    {!! Form::errorFormField('foto', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('documento', $errors) !!}
    {!! Form::label('documento', 'Outro Documento', ['class'=>'control-label']) !!}

    {{-- Usado apenas para a ação de atualizar --}}
    <br>
    @if(isset($membro))
        <img src="{{ asset($membro->documento) }}" class="img-thumbnail" width="200">
        <input type="hidden" name="documentoAtual" value="{{$membro->documento}}">
        <p class="text-warning">Para alterar, escolha uma nova imagem.</p>
    @endif

    {!! Form::file('documento') !!}
    {!! Form::errorFormField('documento', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('estado', $errors) !!}
{!! Form::label('ativo', 'Estado') !!}
	<div class="radio">
	    <label>{!! Form::radio('ativo', '1', true) !!} Ativo </label>
	    <label>{!! Form::radio('ativo', '0') !!} Inativo</label>
	</div>
{!! Html::closeFormGroup() !!}
