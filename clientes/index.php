<?php 
    $page = "clientes";
    require_once("../config.php");
    include(DB_PATH);
    include(HEADER_TEMPLATE); 
?>
<!-- Content -->
<div class="content" style="margin-top: -20px;"> 
    <!-- Container -->
    <div class="container-fluid">

        <div class="row" style="padding-bottom: 20px;">
            <div class="col-sm-8">
                <div class="text-left">
                    <h3>Agenda</h3>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="text-right">
                    <button class="btn btn-success" data-toggle="modal" data-target="#add_cliente_modal">Adicionar</button>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group-lg" role="search">
                    <input type="text" class="form-control" autocomplete="off" onfocus="empresa_pesquisa.value=''" placeholder="Buscar por Cliente" id="cliente_pesquisa">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group-lg" role="search">
                    <input type="text" class="form-control" autocomplete="off" onfocus="cliente_pesquisa.value=''" placeholder="Buscar por Empresa" id="empresa_pesquisa">
                </div>
            </div>
        </div>

        <!-- row -->
        <div class="row">
            <div class="clientes_content"></div>
        </div><!-- End Row -->

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
                                <div class="col-sm-8">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nome Completo</label>
                                        <input type="text" class="form-control" id="nome"/>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Data Nascimento</label>
                                        <input type="text" class="form-control" id="nascimento" onkeypress="return isNumberKey(event)"/>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Empresa</label>
                                        <input type="text" class="form-control" id="empresa"/>
                                    </div>
                                </div> 
                                <div class="col-sm-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Cidade</label>
                                        <input type="text" class="form-control" id="cidade"/>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group label-floating">
                                        <label class="control-label">UF</label>
                                        <input type="text" class="form-control" id="uf"/>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group label-floating">
                                        <label class="control-label">CEP</label>
                                        <input type="text" class="form-control" id="cep" onkeypress="return isNumberKey(event)"/>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Endereço</label>
                                        <input type="text" class="form-control" id="endereco"/>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Bairro</label>
                                        <input type="email" class="form-control" id="bairro"/>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group label-floating">
                                        <label class="control-label">DDD</label>
                                        <input type="text" class="form-control" id="ddd1" onkeypress="return isNumberKey(event)"/>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Telefone 1</label>
                                        <input type="text" class="form-control" id="telefone1" onkeypress="return isNumberKey(event)"/>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group label-floating">
                                        <label class="control-label">DDD</label>
                                        <input type="text" class="form-control" id="ddd2" onkeypress="return isNumberKey(event)"/>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Telefone 2</label>
                                        <input type="text" class="form-control" id="telefone2" onkeypress="return isNumberKey(event)"/>
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
                                <div class="col-sm-8">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nome Completo</label>
                                        <input type="text" class="form-control" id="update_nome"/>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Data Nascimento</label>
                                        <input type="text" class="form-control" id="update_nascimento" onkeypress="return isNumberKey(event)"/>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Empresa</label>
                                        <input type="text" class="form-control" id="update_empresa"/>
                                    </div>
                                </div> 
                                <div class="col-sm-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Cidade</label>
                                        <input type="text" class="form-control" id="update_cidade"/>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group label-floating">
                                        <label class="control-label">UF</label>
                                        <input type="text" class="form-control" id="update_uf"/>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group label-floating">
                                        <label class="control-label">CEP</label>
                                        <input type="text" class="form-control" id="update_cep" onkeypress="return isNumberKey(event)"/>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Endereço</label>
                                        <input type="text" class="form-control" id="update_endereco"/>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Bairro</label>
                                        <input type="text" class="form-control" id="update_bairro"/>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group label-floating">
                                        <label class="control-label">DDD</label>
                                        <input type="text" class="form-control" id="update_ddd1" onkeypress="return isNumberKey(event)"/>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Telefone 1</label>
                                        <input type="text" class="form-control" id="update_telefone1" onkeypress="return isNumberKey(event)"/>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group label-floating">
                                        <label class="control-label">DDD</label>
                                        <input type="text" class="form-control" id="update_ddd2" onkeypress="return isNumberKey(event)"/>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Telefone 2</label>
                                        <input type="text" class="form-control" id="update_telefone2" onkeypress="return isNumberKey(event)"/>
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
                                    <th>Empresa</th>
                                    <td id="view_empresa"></td>
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
                                    <th>CEP</th>
                                    <td id="view_cep"></td>
                                  </tr>
                                  <tr>
                                    <th>Cidade</th>
                                    <td id="view_cidade"></td>
                                  </tr>
                                  <tr>
                                    <th>UF</th>
                                    <td id="view_uf"></td>
                                  </tr>
                                  <tr>
                                    <th>DDD</th>
                                    <td id="view_ddd"></td>
                                  </tr>
                                  <tr>
                                    <th>Telefone</th>
                                    <td id="view_fone"></td>
                                  </tr>
                                  <tr>
                                    <th>DDD</th>
                                    <td id="view_ddd1"></td>
                                  </tr>
                                  <tr>
                                    <th>Telefone</th>
                                    <td id="view_fone1"></td>
                                  </tr>
                                  <tr>
                                    <th>Data Nascimento</th>
                                    <td id="view_nascimento"></td>
                                  </tr>
                                  <tr>
                                    <th>Data Cadastro</th>
                                    <td id="view_data_cadastro"></td>
                                  </tr>
                                  <tr>
                                    <th>Observação</th>
                                    <td>
                                        <textarea id="view_obs" cols="90" rows="8" readonly></textarea>
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
   
    </div> <!-- End Container -->
</div> <!-- End Content -->

<script>
var input = document.getElementById("cliente_pesquisa");
input.addEventListener("keyup", function(event) {
    event.preventDefault();
    if (event.keyCode === 13) {
        readClientes();
    }
});

var input = document.getElementById("empresa_pesquisa");
input.addEventListener("keyup", function(event) {
    event.preventDefault();
    if (event.keyCode === 13) {
        readEmpresas();
    }
});
</script>

<?php include(FOOTER_TEMPLATE); ?>