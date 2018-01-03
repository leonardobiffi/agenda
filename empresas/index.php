<?php 
    $page = "empresas";
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
                        <h3>Empresas</h3> 
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="text-right">
                        <button class="btn btn-success" data-toggle="modal" data-target="#add_empresa_modal">Adicionar</button>
                    </div>
                </div>
            </div>

            <!-- tables -->
            <div class="empresas_content"></div>
            <!-- end tables -->

            <!-- Modal Adicionar Empresa -->
            <div class="modal fade" id="add_empresa_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                        <input type="text" class="form-control" id="nome"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">CNPJ</label>
                                        <input type="text" class="form-control" id="cnpj"/>
                                    </div>
                                </div> 
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Bairro</label>
                                        <input type="text" class="form-control" id="bairro"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="status">Estado</label>
                                        <div class="index_estados_content"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="peril">Cidade</label>
                                        <div class="index_cidades_content">
                                            <select type='text' id='id_cidade' class='form-control'>
                                              <option value=''>Selecione a Cidade...</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Endereço</label>
                                        <input type="text" class="form-control" id="endereco"/>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Número</label>
                                        <input type="text" class="form-control" id="numero"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Telefone</label>
                                        <input type="text" class="form-control" id="telefone"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Celular</label>
                                        <input type="text" class="form-control" id="celular"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success btn-simple" onclick="addEmpresa()"><i class="fa fa-check"></i> Salvar</button>
                            <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal"><i class="fa fa-close"></i> Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIm modal Adicionar Empresa -->

            <!-- Modal Editar Empresa -->
            <div class="modal fade" id="update_empresa_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Editar Empresa</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nome</label>
                                        <input type="text" class="form-control" id="update_nome"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">CNPJ</label>
                                        <input type="text" class="form-control" id="update_cnpj"/>
                                    </div>
                                </div> 
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Bairro</label>
                                        <input type="text" class="form-control" id="update_bairro"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="status">Estado</label>
                                        <div class="index_estados_update_content"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="peril">Cidade</label>
                                        <div class="index_cidades_update_content">
                                            <select type='text' id='update_cidade' class='form-control'>
                                              <option value=''>Selecione a Cidade...</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Endereço</label>
                                        <input type="text" class="form-control" id="update_endereco"/>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Número</label>
                                        <input type="text" class="form-control" id="update_numero"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Telefone</label>
                                        <input type="text" class="form-control" id="update_telefone"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Celular</label>
                                        <input type="text" class="form-control" id="update_celular"/>
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
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success btn-simple" onclick="updateEmpresa()"><i class="fa fa-check"></i> Salvar</button>
                            <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal"><i class="fa fa-close"></i> Fechar</button>
                            <input type="hidden" id="hidden_empresa_id">
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIm modal Editar Empresa -->

            <!-- Modal Visualizar Empresa -->
            <div class="modal fade" id="view_empresa_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Visualizar Empresa</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <table class="table">
                                  <tr>
                                    <th>Nome</th>
                                    <td id="view_nome"></td>
                                  </tr>
                                  <tr>
                                    <th>CNPJ</th>
                                    <td id="view_cnpj"></td>
                                  </tr>
                                  <tr>
                                    <th>Endereço</th>
                                    <td id="view_endereco"></td>
                                  </tr>
                                  <tr>
                                    <th>Bairro</th>
                                    <td id="view_bairro"></td>
                                  </tr>
                                  <tr>
                                    <th>Número</th>
                                    <td id="view_numero"></td>
                                  </tr>
                                  <tr>
                                    <th>Cidade</th>
                                    <td id="view_cidade"></td>
                                  </tr>
                                  <tr>
                                    <th>Estado</th>
                                    <td id="view_estado"></td>
                                  </tr>
                                  <tr>
                                    <th>Telefone</th>
                                    <td id="view_telefone"></td>
                                  </tr>
                                  <tr>
                                    <th>Celular</th>
                                    <td id="view_celular"></td>
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
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal"><i class="fa fa-close"></i> Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fim modal Visualizar Empresa -->

            <!-- Modal - Excluir Empresa -->
            <div class="modal fade" id="delete_empresa_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalLabel">Excluir Empresa</h4>
                  </div>
                  <div class="modal-body">
                    Deseja <strong>Excluir</strong> esta Empresa?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-simple" onclick="deleteEmpresa()"><i class="fa fa-check"></i> Sim</button>
                    <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal"><i class="fa fa-close"></i> Não</button>
                    <input type="hidden" id="delete_empresa_id">
                  </div>
                </div>
              </div>
            </div> <!-- Fim Modal excluir Empresa -->

        </div>
    </div>

<?php include(FOOTER_TEMPLATE); ?>