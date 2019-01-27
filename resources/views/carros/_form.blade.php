{!! Form::hidden('redirect_to', URL::previous()) !!}

@if(isset($carro))
{!! Html::openFormGroup('membro_id', $errors) !!}
    {!! Form::label('membro_id', 'Selecione o Membro Responsável') !!}
    {!! Form::select('membro_id', $membros, $carro->membro->id, ['class' => 'form-control']) !!}
{!! Html::closeFormGroup() !!}
@else
{!! Html::openFormGroup('membro_id', $errors) !!}
    {!! Form::label('membro_id', 'Selecione o Membro Responsável') !!}
    {!! Form::select('membro_id', $membros, null, ['class' => 'form-control']) !!}
{!! Html::closeFormGroup() !!}
@endif

{!! Html::openFormGroup('tipo', $errors) !!}
    {!! Form::label('tipo', 'Tipo de Veículo', ['class'=>'control-label']) !!}
    {!! Form::text('tipo', null, ['class' => 'form-control']) !!}
    {!! Form::errorFormField('tipo', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('descricao', $errors) !!}
    {!! Form::label('descricao', 'Descrição', ['class'=>'control-label']) !!}
    {!! Form::textarea('descricao', null, ['class' => 'form-control', 'id' => 'summernote']) !!}
    {!! Form::errorFormField('descricao', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('documento', $errors) !!}
    {!! Form::label('documento', 'Imagem do Documento', ['class'=>'control-label']) !!}

    {{-- Usado apenas para a ação de atualizar --}}
    <br>
    @if(isset($carro))
        <img src="{{ asset($carro->documento) }}" class="img-thumbnail" width="200">
        <input type="hidden" name="documentoAtual" value="{{$carro->documento}}">
        <p class="text-warning">Para alterar, escolha uma nova imagem.</p>
    @endif

    {!! Form::file('documento') !!}
    {!! Form::errorFormField('documento', $errors) !!}
{!! Html::closeFormGroup() !!}


{!! Html::openFormGroup('alvara_SEMOB', $errors) !!}
    {!! Form::label('alvara_SEMOB', 'Imagem do Alvará da SEMOB', ['class'=>'control-label']) !!}

    {{-- Usado apenas para a ação de atualizar --}}
    <br>
    @if(isset($carro))
        <img src="{{ asset($carro->alvara_SEMOB) }}" class="img-thumbnail" width="200">
        <input type="hidden" name="alvara_SEMOBAtual" value="{{$carro->alvara_SEMOB}}">
        <p class="text-warning">Para alterar, escolha uma nova imagem.</p>
    @endif

    {!! Form::file('alvara_SEMOB') !!}
    {!! Form::errorFormField('alvara_SEMOB', $errors) !!}
{!! Html::closeFormGroup() !!}


{!! Html::openFormGroup('registro_SEMOB', $errors) !!}
    {!! Form::label('registro_SEMOB', 'Número de Registro na SEMOB', ['class'=>'control-label']) !!}
    {!! Form::number('registro_SEMOB', null, ['class' => 'form-control']) !!}
    {!! Form::errorFormField('registro_SEMOB', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('estado', $errors) !!}
{!! Form::label('ativo', 'Estado') !!}
	<div class="radio">
	    <label>{!! Form::radio('ativo', '1', true) !!} Ativo </label>
	    <label>{!! Form::radio('ativo', '0') !!} Inativo</label>
	</div>
{!! Html::closeFormGroup() !!}