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
                        <button class="btn btn-success" data-toggle="modal" data-target="#myModal">Adicionar</button>
                    </div>
                </div>
            </div>

            <!-- table -->
            <div class="usuarios_content"></div>
            <!-- end table -->

            <!-- Modal Core -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                        <input type="text" class="form-control" name="usuario"/>
                                    </div>
                                </div> 
                                <div class="col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="octane">Perfil</label>
                                        <select class="form-control" id="octane" name="octane">
                                            <option></option>
                                            <option value="85">Administrador</option>
                                            <option value="87">Funcionário</option>n>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nome Completo</label>
                                        <input type="text" class="form-control" name="nome_completo"/>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Senha</label>
                                        <input type="password" class="form-control" name="senha"/>
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