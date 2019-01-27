{!! Form::hidden('carro_id', $carro->id) !!}

{!! Html::openFormGroup('titulo', $errors) !!}
    {!! Form::label('titulo', 'Titulo', ['class'=>'control-label']) !!}
    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
    {!! Form::errorFormField('titulo', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('descricao', $errors) !!}
    {!! Form::label('descricao', 'Descrição') !!}
    {!! Form::textarea('descricao', null, ['class' => 'form-control', 'id' => 'summernote']) !!}
    {!! Form::errorFormField('descricao', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('imagem', $errors) !!}
    {!! Form::label('imagem', 'Imagem', ['class'=>'control-label']) !!}
    {!! Form::file('imagens[]', ['multiple' => true]) !!}
    {!! Form::errorFormField('imagem', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('tipo', $errors) !!}
{!! Form::label('tipo', 'Tipo de Imagem') !!}
    <div class="radio">
        <label>{!! Form::radio('tipo', 'Carro', true) !!} Carro </label>
        <label>{!! Form::radio('tipo', 'Panfleto') !!} Panfleto</label>
    </div>
{!! Html::closeFormGroup() !!}