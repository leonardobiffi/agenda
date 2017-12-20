<?php 
    $page = "empresas";
    require_once("config.php");
    include(DB_PATH);
    include(HEADER_TEMPLATE); 
?>

    <!-- Container -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-8">
                    <div class="text-left">
                        <h3>Empresas</h3>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="text-right">
                        <button class="btn btn-success" data-toggle="modal" data-target="#myModal">Adicionar</button>
                    </div>
                </div>
            </div>

            <!-- tables -->
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>Nome</th>
                        <th>CNPJ</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th class="text-right">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1</td>
                        <td>Gazin</td>
                        <td>000.000.0000/12</td>
                        <td>São Paulo</td>
                        <td>SP</td>
                        <td class="td-actions text-right">
                            <button type="button" rel="tooltip" title="Visualizar" class="btn btn-info btn-simple btn-xs">
                                <i class="material-icons">business</i>
                            </button>
                            <button type="button" rel="tooltip" title="Editar" class="btn btn-success btn-simple btn-xs">
                                <i class="material-icons">edit</i>
                            </button>
                            <button type="button" rel="tooltip" title="Excluir" class="btn btn-danger btn-simple btn-xs">
                                <i class="material-icons">delete</i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">2</td>
                        <td>JJH Advogacia e Contabilidade</td>
                        <td>101.012.2555/125</td>
                        <td>Rio de Janeiro</td>
                        <td>RJ</td>
                        <td class="td-actions text-right">
                            <button type="button" rel="tooltip" title="Visualizar" class="btn btn-info btn-simple btn-xs">
                                <i class="material-icons">business</i>
                            </button>
                            <button type="button" rel="tooltip" title="Editar" class="btn btn-success btn-simple btn-xs">
                                <i class="material-icons">edit</i>
                            </button>
                            <button type="button" rel="tooltip" title="Excluir" class="btn btn-danger btn-simple btn-xs">
                                <i class="material-icons">delete</i>
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
            <!-- end tables -->

            <!-- Modal Core -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Nova Empresa</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nome</label>
                                        <input type="text" class="form-control" name="usuario"/>
                                    </div>
                                </div> 
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">CNPJ</label>
                                        <input type="text" class="form-control" name="cnpj"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Telefone</label>
                                        <input type="text" class="form-control" name="senha"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="octane">Estado</label>
                                        <select class="form-control" id="octane" name="octane">
                                            <option></option>
                                            <option value="SP" selected>SP</option>
                                            <option value="RJ">RJ</option>n>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="octane">Cidade</label>
                                        <select class="form-control" id="octane" name="octane">
                                            <option></option>
                                            <option value="SP" selected>São Paulo</option>
                                            <option value="RJ">Rio de Janeiro</option>n>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Endereço</label>
                                        <input type="text" class="form-control" name="senha"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Bairro</label>
                                        <input type="text" class="form-control" name="senha"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Número</label>
                                        <input type="text" class="form-control" name="senha"/>
                                    </div>
                                </div>
                            </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-info btn-simple">Salvar</button>
                </div>
                </div>
            </div>
            </div>

        </div>
    </div>

<?php include(FOOTER_TEMPLATE); ?>