{!! Form::hidden('membro_id', $membro->id) !!}

{!! Html::openFormGroup('nome', $errors) !!}
    {!! Form::label('nome', 'Nome', ['class'=>'control-label']) !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
    {!! Form::errorFormField('nome', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('logomarca', $errors) !!}
    {!! Form::label('logomarca', 'Logomarca', ['class'=>'control-label']) !!}

    {{-- Usado apenas para a ação de atualizar --}}
    <br>
    @if(isset($patrocinio))
        <img src="{{ asset($patrocinio->logomarca) }}" class="img-thumbnail" width="200">
        <input type="hidden" name="logomarca_Atual" value="{{$patrocinio->logomarca}}">
        <p class="text-warning">Para alterar, escolha uma nova imagem.</p>
    @endif

    {!! Form::file('logomarca') !!}
    {!! Form::errorFormField('logomarca', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('estado', $errors) !!}
{!! Form::label('ativo', 'Estado') !!}
	<div class="radio">
	    <label>{!! Form::radio('ativo', '1', true) !!} Ativo </label>
	    <label>{!! Form::radio('ativo', '0') !!} Inativo</label>
	</div>
{!! Html::closeFormGroup() !!}