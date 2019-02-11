{!! Form::hidden('redirect_to', URL::previous()) !!}

{!! Html::openFormGroup('titulo', $errors) !!}
    {!! Form::label('titulo', 'Título', ['class'=>'control-label']) !!}
    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
    {!! Form::errorFormField('titulo', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('sub_titulo', $errors) !!}
    {!! Form::label('sub_titulo', 'Sub-Título') !!}
    {!! Form::text('sub_titulo', null, ['class' => 'form-control']) !!}
    {!! Form::errorFormField('sub_titulo', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('destaque', $errors) !!}
{!! Form::label('destaque', 'destaque de Banner') !!}
    <div class="radio">
        @if (isset($noticia->destaque))
            <label>{!! Form::radio('destaque', 1, $noticia->destaque) !!} Sim </label>
            <label>{!! Form::radio('destaque', 0, $noticia->destaque) !!} Não</label>
        @else
            <label>{!! Form::radio('destaque', 1, null) !!} Sim </label>
            <label>{!! Form::radio('destaque', 0, true) !!} Não</label>
        @endif
    </div>
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('data_para_publicar_destaque', $errors) !!}
    {!! Form::label('data_para_publicar_destaque', 'Se Destaque, informe a data para publicar', ['class'=>'control-label']) !!}
    {{-- {!! Form::number('data_para_publicar_destaque', null, ['class' => 'form-control']) !!} --}}
    {!! Form::date('data_para_publicar_destaque', null, ['class' => 'form-control']) !!}
    {!! Form::errorFormField('data_para_publicar_destaque', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('data_de_expiracao_destaque', $errors) !!}
    {!! Form::label('data_de_expiracao_destaque', 'Data para sair de Destaque', ['class'=>'control-label']) !!}
    {{-- {!! Form::number('data_de_expiracao_destaque', null, ['class' => 'form-control']) !!} --}}
    {!! Form::date('data_de_expiracao_destaque', null, ['class' => 'form-control']) !!}
    {!! Form::errorFormField('data_de_expiracao_destaque', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('capa', $errors) !!}
    {!! Form::label('capa', 'capa (580x250 px)', ['class'=>'control-label']) !!}

    {{-- Usado apenas para a ação de atualizar --}}
    <br>
    @if(isset($noticia))
        <img src="{{ asset($noticia->capa) }}" class="img-thumbnail" width="300">
        <input type="hidden" name="capaAtual" value="{{$noticia->capa}}">
        <p class="text-warning">Para alterar, escolha uma nova capa.</p>
    @endif

    {!! Form::file('capa') !!}
    {!! Form::errorFormField('capa', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('ativo', $errors) !!}
{!! Form::label('ativo', 'Estado') !!}
    <div class="radio">
        @if (isset($noticia->ativo))
            <label>{!! Form::radio('ativo', 1, $noticia->ativo) !!} Ativo </label>
            <label>{!! Form::radio('ativo', 0, $noticia->ativo) !!} Inativo</label>
        @else
            <label>{!! Form::radio('ativo', 1, null) !!} Ativo </label>
            <label>{!! Form::radio('ativo', 0, true) !!} Inativo</label>         
        @endif
    </div>
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('texto', $errors) !!}
    {!! Form::label('texto', 'Texto') !!}
    {!! Form::textarea('texto', null, ['class' => 'form-control', 'id' => 'summernote']) !!}
    {!! Form::errorFormField('texto', $errors) !!}
{!! Html::closeFormGroup() !!}