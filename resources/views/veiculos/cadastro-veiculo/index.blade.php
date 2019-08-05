@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row-fluid">

            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Cadastro de Veículos</div>
                    <div class="panel-body">
                        <a href="{{ url('/veiculo/create') }}" class="btn btn-success btn-sm" title="Criar novo">
                            <i class="glyphicon glyphicon-plus" aria-hidden="true"></i> Criar novo Carro
                        </a>

                        <form method='GET' action='' class='navbar-form navbar-right' role='search'>
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Buscar...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                </button>
                            </span>
                        </div>
                        </form>

                        @if (Session::has('message'))
                        <br/>
                        <br/>
                        <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible span4" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>{{ Session::get('message') }}</strong>
                        </div>
                        @endif

                        <br/>
                        <br/>                       
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Placa</th><th>Renavam</th><th>Modelo</th><th>Marca</th><th>Ano</th><th>Proprietário</th><th>Atualização</th>
                                        @if (Auth::user()->role == 2)
                                        <th colspan="2"></th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($cadastroveiculos as $item)
                                    <tr>
                                        <td>{{ $item->placa }}</td>
                                        <td>{{ $item->renavam }}</td>
                                        <td>{{ $item->modelo }}</td>
                                        <td>{{ $item->marca }}</td>
                                        <td>{{ $item->ano }}</td>
                                        <td>{{ $item->proprietario }}</td>
                                        <td>{{ date("d/m/Y H:i:s", strtotime($item->updated_at)) }}</td>    
                                        @if (Auth::user()->role == 2)
                                        <td>
                                            <a href="{{ url('/veiculo/' . $item->id . '/edit') }}" title="Editar Cadastro"><button class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i> Editar</button></a>
                                            
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/veiculo', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="glyphicon glyphicon-trash" aria-hidden="true"></i> Excluir', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Excluir Cadastro',
                                                        'onclick'=>'return confirm("Confirma a exclus&atilde;o?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

