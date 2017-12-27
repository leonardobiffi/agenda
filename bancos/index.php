<?php 
    $page = "bancos";
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
                        <h3>Bancos</h3>
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
                        <th class="text-right">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1</td>
                        <td>Banco do Brasil</td>
                        <td class="td-actions text-right">
                            <button type="button" rel="tooltip" title="Visualizar" class="btn btn-info btn-simple btn-xs">
                                <i class="material-icons">account_balance</i>
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
                        <td>Bradesco</td>
                        <td class="td-actions text-right">
                            <button type="button" rel="tooltip" title="Visualizar" class="btn btn-info btn-simple btn-xs">
                                <i class="material-icons">account_balance</i>
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
                    <h4 class="modal-title" id="myModalLabel">Novo Banco</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nome</label>
                                        <input type="text" class="form-control" name="usuario"/>
                                    </div>
                                </div> 
                                <div class="col-sm-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Identificação</label>
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