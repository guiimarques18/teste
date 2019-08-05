@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row-fluid">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Cadastrar Novo Processo Seletivo</div>
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

                        {!! Form::open(['url' => '/veiculo', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('veiculos.cadastro-veiculo.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
