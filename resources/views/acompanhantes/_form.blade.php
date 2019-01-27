{!! Form::hidden('redirect_to', URL::previous()) !!}

{!! Form::hidden('membro_id', $membro->id) !!}

{!! Html::openFormGroup('nome', $errors) !!}
    {!! Form::label('nome', 'Nome', ['class'=>'control-label']) !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
    {!! Form::errorFormField('nome', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('alvara_SEMOB', $errors) !!}
    {!! Form::label('alvara_SEMOB', 'Alvará da Semob', ['class'=>'control-label']) !!}

    {{-- Usado apenas para a ação de atualizar --}}
    <br>
    @if(isset($acompanhante))
        <img src="{{ asset($acompanhante->alvara_SEMOB) }}" class="img-thumbnail" width="200">
        <input type="hidden" name="alvara_SEMOBAtual" value="{{$acompanhante->alvara_SEMOB}}">
        <p class="text-warning">Para alterar, escolha uma nova imagem.</p>
    @endif

    {!! Form::file('alvara_SEMOB') !!}
    {!! Form::errorFormField('alvara_SEMOB', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('estado', $errors) !!}
{!! Form::label('ativo', 'Estado') !!}
	<div class="radio">
	    <label>{!! Form::radio('ativo', '1', true) !!} Ativo </label>
	    <label>{!! Form::radio('ativo', '0') !!} Inativo</label>
	</div>

{!! Html::closeFormGroup() !!}
