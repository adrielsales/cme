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

{!! Html::openFormGroup('posicao', $errors) !!}
    {!! Form::label('posicao', 'Posição - Sequência de exibição', ['class'=>'control-label']) !!}
    {!! Form::number('posicao', null, ['class' => 'form-control']) !!}
    {!! Form::errorFormField('posicao', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('imagem', $errors) !!}
    {!! Form::label('imagem', 'Imagem (Slides: 800x400px - Banner: 400px)', ['class'=>'control-label']) !!}

    {{-- Usado apenas para a ação de atualizar --}}
    <br>
    @if(isset($banner))
        <img src="{{ asset($banner->imagem) }}" class="img-thumbnail" width="200">
        <input type="hidden" name="imagemAtual" value="{{$banner->imagem}}">
        <p class="text-warning">Para alterar, escolha uma nova imagem.</p>
    @endif

    {!! Form::file('imagem') !!}
    {!! Form::errorFormField('imagem', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('tipo', $errors) !!}
{!! Form::label('tipo', 'Tipo de Banner') !!}
    <div class="radio">
        <label>{!! Form::radio('tipo', 'Slide', true) !!} Slide </label>
        <label>{!! Form::radio('tipo', 'Patrocinador') !!} Patrocinador</label>
    </div>
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('ativo', $errors) !!}
{!! Form::label('ativo', 'Estado') !!}
    <div class="radio">
        <label>{!! Form::radio('ativo', '1', true) !!} Ativo </label>
        <label>{!! Form::radio('ativo', '0') !!} Inativo</label>
    </div>
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('exibirTitulos', $errors) !!}
{!! Form::label('exibirTitulos', 'Exibir Títulos') !!}
    <div class="radio">
        <label>{!! Form::radio('exibirTitulos', '1', true) !!} Sim </label>
        <label>{!! Form::radio('exibirTitulos', '0') !!} Não</label>
    </div>
{!! Html::closeFormGroup() !!}