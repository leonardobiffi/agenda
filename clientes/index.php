<?php 
    $page = "clientes";
    require_once("../config.php");
    include(DB_PATH);
    include(HEADER_TEMPLATE); 
?>

    <!-- Container -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-8">
                    <div class="text-left">
                        <h3>Clientes</h3>
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
                        <th>Nome Completo</th>
                        <th>Empresa</th>
                        <th>Telefone</th>
                        <th>E-Mail</th>
                        <th class="text-right">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1</td>
                        <td>Andrew Mike</td>
                        <td>Gazin</td>
                        <td>(43) 9999-66335</td>
                        <td>andrew@tste.com</td>
                        <td class="td-actions text-right">
                            <button type="button" rel="tooltip" title="Visualizar" class="btn btn-info btn-simple btn-xs">
                                <i class="material-icons">person</i>
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
                        <td class="text-center">4</td>
                        <td>Dakota Rice</td>
                        <td>JJH Advogacia e Contabilidade</td>
                        <td>(55) 9999-9999</td>
                        <td>dak@teste.com</td>
                        <td class="td-actions text-right">
                            <button type="button" rel="tooltip" title="Visualizar" class="btn btn-info btn-simple btn-xs">
                                <i class="material-icons">person</i>
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
                    <h4 class="modal-title" id="myModalLabel">Novo Cliente</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nome Completo</label>
                                        <input type="text" class="form-control" name="usuario"/>
                                    </div>
                                </div> 
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="octane">Empresa</label>
                                        <select class="form-control" id="octane" name="octane">
                                            <option></option>
                                            <option value="85">Gazin</option>
                                            <option value="87">JJH Advogacia e Contabilidade</option>
                                            <option value="89">ABV Supermercado</option>
                                            <option value="91">Posto Santo</option>
                                            <option value="diesel">HVV</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Telefone</label>
                                        <input type="tel" class="form-control" name="senha"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Celular 1</label>
                                        <input type="text" class="form-control" name="senha"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Celular 2</label>
                                        <input type="text" class="form-control" name="senha"/>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">E-mail</label>
                                        <input type="email" class="form-control" name="senha"/>
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