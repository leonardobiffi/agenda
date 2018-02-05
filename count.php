<?php 
    require_once("config.php");
    include(DB_PATH);


    //contagem usuarios
    $query = "SELECT count(*) as num_usuario FROM usuario";

    if (!$result = mysqli_query($link, $query)) {
        exit(mysqli_error($link));
    }
    $data = array();
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
               
        }
    }
    else
    {
        $data['num_usuario'] = "0"; 
    }

    //contagem empresas
    $query = "select count(DISTINCT empresa) as num_empresa from cliente;";

    if (!$result = mysqli_query($link, $query)) {
        exit(mysqli_error($link));
    }

    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
               
        }
    }
    else
    {
        $data['num_empresa'] = "0"; 
    }

    //contagem cliente
    $query = "SELECT count(*) as num_cliente FROM cliente";

    if (!$result = mysqli_query($link, $query)) {
        exit(mysqli_error($link));
    }

    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
               
        }
    }
    else
    {
        $data['num_cliente'] = "0"; 
    }

?>