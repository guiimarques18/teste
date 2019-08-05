<div class="form-group {{ $errors->has('placa') ? 'has-error' : ''}}">
    {!! Form::label('placa', 'Placa', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('placa', null, ['class' => 'form-control', 'placeholder' => 'Número da Placa', 'required']) !!}
        {!! $errors->first('placa', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('renavam') ? 'has-error' : ''}}">
    {!! Form::label('renavam', 'Renavam', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('renavam', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('renavam', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('modelo') ? 'has-error' : ''}}">
    {!! Form::label('modelo', 'Modelo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('modelo', null, ['class' => 'form-control']) !!}
        {!! $errors->first('modelo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('marca') ? 'has-error' : ''}}">
    {!! Form::label('marca', 'Marca', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('marca', null, ['class' => 'form-control']) !!}
        {!! $errors->first('marca', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('ano') ? 'has-error' : ''}}">
    {!! Form::label('ano', 'Ano', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('ano', null, ['class' => 'form-control']) !!}
        {!! $errors->first('ano', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('proprietario') ? 'has-error' : ''}}">
    {!! Form::label('proprietario', 'Proprietário - CPF', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('proprietario', null, ['class' => 'form-control', 'placeholder'=>'Apenas Números']) !!}
        {!! $errors->first('proprietario', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Cadastrar', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
