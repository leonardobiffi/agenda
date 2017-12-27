<?php
    // Initialize the session
    session_set_cookie_params(0);
    session_start();

    // If session variable is not set it will redirect to login page
    if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
      header("location: login.php");
      exit;
    }
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo BASEURL; ?>img/apple-icon.png" />
    <link rel="icon" type="image/png" href="<?php echo BASEURL; ?>img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Agenda de Clientes</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="<?php echo BASEURL; ?>css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="<?php echo BASEURL; ?>css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

    <!--
    <link rel="stylesheet" href="assets/css/material.min.css">
    <script defer src="assets/js/material.min.js"></script> 
    <link rel="stylesheet" href="assets/css/getmdl-select.min.css">
    <script defer src="assets/js/getmdl-select.min.js"></script>
    -->
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="blue" data-image="img/sidebar-1.jpg">
            <!--
                Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

                Tip 2: you can also add an image using data-image tag 
            -->
            <div class="logo">
                <a href="#" class="simple-text">
                    Nome Empresa
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="<?php if($page=='inicio'){echo 'active';}?>">
                        <a href="<?php echo BASEURL; ?>">
                            <i class="material-icons">home</i>
                            <p>Início</p>
                        </a>
                    </li>
                    <li class="<?php if($page=='usuarios'){echo 'active';}?>">
                        <a href="<?php echo BASEURL; ?>usuarios/">
                            <i class="material-icons">person</i>
                            <p>Usuários</p>
                        </a>
                    </li>
                    <li class="<?php if($page=='bancos'){echo 'active';}?>">
                        <a href="<?php echo BASEURL; ?>bancos">
                            <i class="material-icons">account_balance</i>
                            <p>Bancos</p>
                        </a>
                    </li>
                    <li class="<?php if($page=='empresas'){echo 'active';}?>">
                        <a href="<?php echo BASEURL; ?>empresas">
                            <i class="material-icons">business</i>
                            <p>Empresas</p>
                        </a>
                    </li>
                    <li class="<?php if($page=='clientes'){echo 'active';}?>">
                        <a href="<?php echo BASEURL; ?>clientes">
                            <i class="material-icons">work</i>
                            <p>Clientes</p>
                        </a>
                    </li>
                    <li class="active-pro">
                        <a href="<?php echo BASEURL; ?>logout.php">
                            <i class="material-icons">cancel</i>
                            <p>Sair</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo BASEURL; ?>"> Agenda de Clientes </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#">
                                    <i class="material-icons">person</i>
                                    <?php echo $_SESSION['username']; ?>
                                    <div class="ripple-container"></div>
                                </a>
                            </li>
                        </ul>
                        <form class="navbar-form navbar-right" role="search">
                            <div class="form-group  is-empty">
                                <input type="text" class="form-control" placeholder="Buscar">
                                <span class="material-input"></span>
                            </div>
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </form>
                    </div>
                </div>
            </nav>