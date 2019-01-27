{!! Form::hidden('redirect_to', URL::previous()) !!}

{!! Html::openFormGroup('nome', $errors) !!}
    {!! Form::label('nome', 'Nome', ['class'=>'control-label']) !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
    {!! Form::errorFormField('nome', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('cidade', $errors) !!}
    {!! Form::label('cidade', 'Cidade', ['class'=>'control-label']) !!}
    {!! Form::text('cidade', null, ['class' => 'form-control']) !!}
    {!! Form::errorFormField('cidade', $errors) !!}
{!! Html::closeFormGroup() !!}