@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row-fluid">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Processo Seletivo <b>{{ $cadastrop->id_ps }} - {{ $cadastrop->desc_ps }}</b></div>
                    <div class="panel-body">

                        <a href="{{ url('/processo_seletivo/cadastro-ps') }}" title="Voltar"><button class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-arrow-left" aria-hidden="true"></i> Voltar</button></a>
                        <a href="{{ url('/processo_seletivo/cadastro-ps/' . $cadastrop->id . '/edit') }}" title="Edit CadastroP"><button class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i> Editar</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['processo_seletivo/cadastrops', $cadastrop->id],
                            'style' => 'display:inline'
                        ]) !!}
<!--                            {!! Form::button('<i class="glyphicon glyphicon-trash" aria-hidden="true"></i> Excluir', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Excluir CadastroPS',
                                    'onclick'=>'return confirm("Confirmaa Excluir?")'
                            ))!!}
                        {!! Form::close() !!}-->
                        <br/>
                        <br/>
                        
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $cadastrop->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Id PS </th>
                                        <td> {{ $cadastrop->id_ps }} </td>
                                    </tr>
                                    <tr>
                                        <th> PS </th>
                                        <td> {{ $cadastrop->desc_ps }} </td>
                                    </tr>
                                    <tr>
                                        <th> Ano PS </th>
                                        <td> {{ $cadastrop->ano_ps }} </td>
                                    </tr>
                                    <tr>
                                        <th> In&iacute;cio das Inscri&ccedil;&otilde;es </th>
                                        <td> {{ date("d/m/Y H:i:s", strtotime($cadastrop->data_inicio_inscricao)) }} </td>
                                    </tr>
                                    <tr>
                                        <th> Fim das Inscri&ccedil;&otilde;es </th>
                                        <td> {{ date("d/m/Y H:i:s", strtotime($cadastrop->data_fim_inscricao)) }} </td>
                                    </tr>
                                    <tr>
                                        <th> Nome do Banco de Dados </th>
                                        <td> {{ $cadastrop->desc_bd }} </td>
                                    </tr>
                                    <tr>
                                        <th> Nome do Banco de Dados </th>
                                        <td> {{ $cadastrop->desc_bd }} </td>
                                    </tr>
                                    <tr>
                                        <th> Diret&oacute;rio </th>
                                        <td> {{ $cadastrop->desc_diretorio }} </td>
                                    </tr>
                                    <tr>
                                        <th> Cargo </th>
                                        <td> {{ ($cadastrop->flag_cargo) == 1 ? 'SIM' : 'N&Atilde;O' }}</td>
                                    </tr>
                                    <tr>
                                        <th> Tempo Adicional </th>
                                        <td> {{ ($cadastrop->flag_tempo_adicional) == 1 ? 'SIM' : 'N&Atilde;O' }} </td>
                                    </tr>
                                    @if ($cadastrop->flag_tempo_adicional == 1)
                                    <tr>
                                        <th> Tempo Adicional - Observa&ccedil;&atilde;o </th>
                                        <td> {{ $cadastrop->tempo_adicional_obs }} </td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <th> Corre&ccedil;&atilde;o Diferenciada </th>
                                        <td> {{ ($cadastrop->flag_correcao_diferenciada) == 1 ? 'SIM' : 'N&Atilde;O' }} </td>
                                    </tr>
                                    <tr>
                                        <th> Possui vagas para PCD </th>
                                        <td> {{ ($cadastrop->flag_vagas_pne) == 1 ? 'SIM' : 'N&Atilde;O' }} </td>
                                    </tr>
                                    <tr>
                                        <th> Letras Libras </th>
                                        <td> {{ ($cadastrop->flag_letras_libras) == 1 ? 'SIM' : 'N&Atilde;O' }} </td>
                                    </tr>
                                    <tr>
                                        <th> &Oacute;rg&atilde;o PS </th>
                                        <td> {{ $cadastrop->orgao_ps }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
