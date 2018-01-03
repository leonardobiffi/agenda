<?php 
    $page = "usuarios";
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
                        <h3>Usuários</h3>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="text-right">
                        <button class="btn btn-success" data-toggle="modal" data-target="#add_usuario_modal">Adicionar</button>
                    </div>
                </div>
            </div>

            <!-- table -->
            <div class="usuarios_content"></div>
            <!-- end table -->

            <!-- Modal Adicionar Usuario -->
            <div class="modal fade" id="add_usuario_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Novo Usuário</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Usuário</label>
                                        <input type="text" class="form-control" id="login"/>
                                    </div>
                                </div> 
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="peril">Perfil</label>
                                        <select class="form-control" id="perfil">
                                            <option></option>
                                            <option value="Administrador">Administrador</option>
                                            <option value="Funcionário">Funcionário</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nome Completo</label>
                                        <input type="text" class="form-control" id="nome_completo"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group label-floating" id="criar-senha">
                                        <label class="control-label">Senha</label>
                                        <input type="password" class="form-control" id="senha" onchange="checkCriarSenha()"/>
                                        <span class="material-icons form-control-feedback" id="ico-criar-senha">done</span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="status">Status</label>
                                        <select class="form-control" id="status">
                                            <option></option>
                                            <option value="1" selected>Ativo</option>
                                            <option value="0">Inativo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success btn-simple" onclick="addUsuario()"><i class="fa fa-check"></i> Salvar</button>
                            <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal"><i class="fa fa-close"></i> Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIm modal Adicionar Usuario -->

            <!-- Modal Editar Usuario -->
            <div class="modal fade" id="update_usuario_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Editar Usuário</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Usuário</label>
                                        <input type="text" class="form-control" id="update_login"/>
                                    </div>
                                </div> 
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="update_perfil">Perfil</label>
                                        <select class="form-control" id="update_perfil">
                                            <option></option>
                                            <option value="Administrador">Administrador</option>
                                            <option value="Funcionário">Funcionário</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nome Completo</label>
                                        <input type="text" class="form-control" id="update_nome"/>
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
                            <button type="button" class="btn btn-success btn-simple" onclick="updateUsuario()"><i class="fa fa-check"></i> Salvar</button>
                            <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal"><i class="fa fa-close"></i> Fechar</button>
                            <input type="hidden" id="hidden_usuario_id">
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIm modal Editar Usuario -->

            <!-- Modal Alterar Senha -->
            <div class="modal fade" id="update_senha_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Alterar Senha</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group label-floating" id="new-senha">
                                        <label class="control-label">Nova Senha</label>
                                        <input type="password" class="form-control" id="mudar_senha" onchange="checkSenha()"/>
                                        <span class="material-icons form-control-feedback" id="ico-new-senha">done</span>
                                    </div>
                                </div> 
                                <div class="col-sm-12">
                                    <div class="form-group label-floating" id="conf-senha">
                                        <label class="control-label">Confirmar Senha</label>
                                        <input type="password" class="form-control" id="confirmar_senha" onchange="checkConfirmarSenha()" />
                                        <span class="material-icons form-control-feedback" id="ico-conf-senha">clear</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success btn-simple" onclick="updateSenha()"><i class="fa fa-check"></i> Salvar</button>
                            <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal"><i class="fa fa-close"></i> Fechar</button>
                            <input type="hidden" id="hidden_senha_id">
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIm modal Alterar Senha -->
            
            <!-- Modal Visualizar Usuario -->
            <div class="modal fade" id="view_usuario_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Visualizar Usuário</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <table class="table">
                                  <tr>
                                    <th>Nome Completo</th>
                                    <td id="view_nome"></td>
                                  </tr>
                                  <tr>
                                    <th>Login</th>
                                    <td id="view_login"></td>
                                  </tr>
                                  <tr>
                                    <th>Perfil</th>
                                    <td id="view_perfil"></td>
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
            <!-- Fim modal Visualizar usuario -->

            <!-- Modal - Excluir Usuario -->
            <div class="modal fade" id="delete_usuario_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalLabel">Excluir Usuário</h4>
                  </div>
                  <div class="modal-body">
                    Deseja <strong>Excluir</strong> este Usuário?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-simple" onclick="deleteUsuario()"><i class="fa fa-check"></i> Sim</button>
                    <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal"><i class="fa fa-close"></i> Não</button>
                    <input type="hidden" id="delete_usuario_id">
                  </div>
                </div>
              </div>
            </div> <!-- Fim Modal excluir usuario -->
        </div>
    </div>

<?php include(FOOTER_TEMPLATE); ?>