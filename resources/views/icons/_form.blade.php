{!! Form::hidden('redirect_to', URL::previous()) !!}

{!! Html::openFormGroup('nome', $errors) !!}
    {!! Form::label('nome', 'Nome', ['class'=>'control-label']) !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
    {!! Form::errorFormField('nome', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('icon', $errors) !!}
    {!! Form::label('icon', 'Icon', ['class'=>'control-label']) !!}
    {!! Form::text('icon', null, ['class' => 'form-control']) !!}
    {!! Form::errorFormField('icon', $errors) !!}
{!! Html::closeFormGroup() !!}