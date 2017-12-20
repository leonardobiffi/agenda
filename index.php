<?php 
    $page = "inicio";
    require_once("config.php");
    include(DB_PATH);
    include(HEADER_TEMPLATE); 
?>
            
            <!-- Container -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="purple">
                                    <i class="material-icons">work</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Clientes</p>
                                    <h3 class="title">15
                                        <small></small>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                    <i class="material-icons">business</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Empresas</p>
                                    <h3 class="title">3</h3>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <i class="material-icons">person</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Usuários</p>
                                    <h3 class="title">2</h3>
                                </div>

                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="blue">
                                    <h4 class="title">Últimos cadastros realizados</h4>
                                    
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <th>ID</th>
                                            <th>Nome Completo</th>
                                            <th>Telefone</th>
                                            <th>E-Mail</th>
                                            <th>Empresa</th>
                                            <th class="text-right">Ações</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Dakota Rice</td>
                                                <td>3425 25258</td>
                                                <td>teste@teste.com</td>
                                                <td>Niger</td>
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
                                                <td>2</td>
                                                <td>Minerva Hooper</td>
                                                <td>6454 4548</td>
                                                <td>teste@teste.com</td>
                                                <td>Curaçao</td>
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
                                                <td>3</td>
                                                <td>Sage Rodriguez</td>
                                                <td>45457 1121</td>
                                                <td>teste@teste.com</td>
                                                <td>Netherlands</td>
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
                                                <td>4</td>
                                                <td>Philip Chaney</td>
                                                <td>1234 4548</td>
                                                <td>teste@teste.com</td>
                                                <td>Korea, South</td>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php include(FOOTER_TEMPLATE); ?>