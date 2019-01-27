{!! Form::hidden('membro_id', $membro->id) !!}

{!! Html::openFormGroup('bairro_id', $errors) !!}
    {!! Form::label('bairro_id', 'Selecione o Bairro') !!}
    {!! Form::select('bairro_id', $bairros, null, ['class' => 'form-control']) !!}
{!! Html::closeFormGroup() !!}