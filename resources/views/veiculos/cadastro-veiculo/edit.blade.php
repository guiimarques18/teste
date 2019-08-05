@extends('layouts.app')

@section('content')
    <div class="container-fluidr">
        <div class="row-fluid">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Cadastro Processo Seletivo - <b>#{{ $cadastroveiculo->placa }}</b></div>
                    <div class="panel-body">
                        <a href="{{ url('/veiculo') }}" title="Voltar"><button class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-arrow-left" aria-hidden="true"></i> Voltar</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($cadastroveiculo, [
                            'method' => 'PATCH',
                            'url' => ['/veiculo', $cadastroveiculo->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('veiculos.cadastro-veiculo.form', ['submitButtonText' => 'Atualizar'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
