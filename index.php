<?php 
    $page = "inicio";
    require_once("count.php");
    include(HEADER_TEMPLATE); 

?>
            
            <!-- Container -->
            <div class="content" style="margin-top: -10px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="purple">
                                    <i class="material-icons">work</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Clientes</p>
                                    <h3 class="title"><?php echo $data[2]['num_cliente']; ?></h3>
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
                                    <h3 class="title"><?php echo $data[1]['num_empresa']; ?></h3>
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
                                    <h3 class="title"><?php echo $data[0]['num_usuario']; ?></h3>
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
                                    <div class="clientes_index_content"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php include(FOOTER_TEMPLATE); ?>