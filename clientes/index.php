<?php 
    $page = "clientes";
    require_once("../config.php");
    include(DB_PATH);
    include(HEADER_TEMPLATE); 
?>

    <!-- Container -->
    <div class="content">
        <div class="container-fluid">

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="material-icons">search</i>
                </span>
                <input class="form-control" id="buscarClientes" type="text" placeholder="Buscar por Clientes ...">
            </div>

            <div class="row">
                <div class="col-sm-8">
                    <div class="text-left">
                        <h3>Clientes</h3>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="text-right">
                        <button class="btn btn-success" data-toggle="modal" data-target="#add_cliente_modal">Adicionar</button>
                    </div>
                </div>
            </div>
            
            <!-- tables -->
            <div class="clientes_content"></div>
            <!-- end tables -->
            
            <!-- Modal Adicionar Cliente -->
            <div class="modal fade" id="add_cliente_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel"><b>Novo Cliente</b></h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nome Completo</label>
                                        <input type="text" class="form-control" id="nome"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">CPF</label>
                                        <input type="text" class="form-control" id="cpf"/>
                                    </div>
                                </div> 
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">RG</label>
                                        <input type="text" class="form-control" id="rg"/>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="status">Empresa</label>
                                        <div class="index_empresas_content"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Email</label>
                                        <input type="email" class="form-control" id="email"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Celular</label>
                                        <input type="text" class="form-control" id="celular"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Telefone 1</label>
                                        <input type="text" class="form-control" id="telefone1"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Telefone 2</label>
                                        <input type="text" class="form-control" id="telefone2"/>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Observação</label>
                                        <textarea class="form-control" rows="6" id="observacao"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success btn-simple" onclick="addCliente()"><i class="fa fa-check"></i> Salvar</button>
                            <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal"><i class="fa fa-close"></i> Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIm modal Adicionar Cliente --> 

            <!-- Modal Editar Cliente -->
            <div class="modal fade" id="update_cliente_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel"><b>Editar Cliente</b></h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nome Completo</label>
                                        <input type="text" class="form-control" id="update_nome"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">CPF</label>
                                        <input type="text" class="form-control" id="update_cpf"/>
                                    </div>
                                </div> 
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">RG</label>
                                        <input type="text" class="form-control" id="update_rg"/>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="status">Empresa</label>
                                        <div class="index_empresas_update_content"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Email</label>
                                        <input type="text" class="form-control" id="update_email"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Celular</label>
                                        <input type="text" class="form-control" id="update_celular"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Telefone 1</label>
                                        <input type="text" class="form-control" id="update_telefone1"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Telefone 2</label>
                                        <input type="text" class="form-control" id="update_telefone2"/>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="update_status">Status</label>
                                        <select class="form-control" id="update_status">
                                            <option></option>
                                            <option value="1">Ativo</option>
                                            <option value="0">Inativo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Observação</label>
                                        <textarea class="form-control" rows="6" id="update_observacao"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success btn-simple" onclick="updateCliente()"><i class="fa fa-check"></i> Salvar</button>
                            <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal"><i class="fa fa-close"></i> Fechar</button>
                            <input type="hidden" id="hidden_cliente_id">
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIm modal Editar Cliente -->

            <!-- Modal Visualizar Cliente -->
            <div class="modal fade" id="view_cliente_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel"><b>Visualizar Cliente</b></h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <table class="table">
                                  <tr>
                                    <th>Nome</th>
                                    <td id="view_nome"></td>
                                  </tr>
                                  <tr>
                                    <th>CPF</th>
                                    <td id="view_cpf"></td>
                                  </tr>
                                  <tr>
                                    <th>RG</th>
                                    <td id="view_rg"></td>
                                  </tr>
                                  <tr>
                                    <th>Empresa</th>
                                    <td id="view_empresa"></td>
                                  </tr>
                                  <tr>
                                    <th>Email</th>
                                    <td id="view_email"></td>
                                  </tr>
                                  <tr>
                                    <th>Celular</th>
                                    <td id="view_celular"></td>
                                  </tr>
                                  <tr>
                                    <th>Telefone 1</th>
                                    <td id="view_telefone1"></td>
                                  </tr>
                                  <tr>
                                    <th>Telefone 2</th>
                                    <td id="view_telefone2"></td>
                                  </tr>
                                  <tr>
                                    <th>Status</th>
                                    <td id="view_status"></td>
                                  </tr>
                                  <tr>
                                    <th>Data Cadastro</th>
                                    <td id="view_data_cadastro"></td>
                                  </tr>
                                  <tr>
                                    <th>Data Modificação</th>
                                    <td id="view_data_modificacao"></td>
                                  </tr>
                                  <tr>
                                    <th>Observação</th>
                                    <td>
                                        <textarea id="view_observacao" cols="50" rows="6" readonly></textarea>
                                    </td>
                                  </tr>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal"><i class="fa fa-close"></i> Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fim modal Visualizar Cliente -->

            <!-- Modal - Excluir Cliente -->
            <div class="modal fade" id="delete_cliente_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalLabel"><b>Excluir Cliente</b></h4>
                  </div>
                  <div class="modal-body">
                    Deseja <strong>Excluir</strong> este Cliente?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-simple" onclick="deleteCliente()"><i class="fa fa-check"></i> Sim</button>
                    <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal"><i class="fa fa-close"></i> Não</button>
                    <input type="hidden" id="delete_cliente_id">
                  </div>
                </div>
              </div>
            </div> <!-- Fim Modal excluir Cliente -->

        </div>
    </div>

<?php include(FOOTER_TEMPLATE); ?>