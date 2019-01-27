{!! Form::hidden('membro_id', $membro->id) !!}

{!! Html::openFormGroup('escola_id', $errors) !!}
    {!! Form::label('escola_id', 'Selecione a Escola') !!}
    {!! Form::select('escola_id', $escolas, null, ['class' => 'form-control']) !!}
{!! Html::closeFormGroup() !!}