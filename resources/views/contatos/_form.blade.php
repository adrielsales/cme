{!! Form::hidden('redirect_to', URL::previous()) !!}

{!! Form::hidden('membro_id', $membro->id) !!}

{!! Html::openFormGroup('icon_id', $errors) !!}
    {!! Form::label('icon_id', 'Tipo de Contato') !!}
    {!! Form::select('icon_id', $icons, null, ['class' => 'form-control']) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('contato', $errors) !!}
    {!! Form::label('contato', 'Contato', ['class'=>'control-label']) !!}
    {!! Form::text('contato', null, ['class' => 'form-control']) !!}
    {!! Form::errorFormField('contato', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('publico', $errors) !!}
{!! Form::label('publico', 'Público?') !!}
    <div class="radio">
        <label>{!! Form::radio('publico', '1', true) !!}
            <strong>Sim</strong> <span class="text-success">(pode ser divulgado)</span></label>
        <label>{!! Form::radio('publico', '0') !!} <strong>Não</strong> <span class="text-danger">(contato apenas para controle interno)</span></label>
    </div>
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('estado', $errors) !!}
{!! Form::label('ativo', 'Estado') !!}
    <div class="radio">
        <label>{!! Form::radio('ativo', '1', true) !!} Ativo </label>
        <label>{!! Form::radio('ativo', '0') !!} Inativo</label>
    </div>
{!! Html::closeFormGroup() !!}
