<?php
    // include Database connection file
    require_once("../config.php");
    include(DB_PATH);

    if(isset($_POST['nome_completo']) && isset($_POST['login']) && isset($_POST['senha']))
    {

        // get values
        $nome_completo = $_POST['nome_completo'];
        $login = $_POST['login'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $perfil = $_POST['perfil'];
        $data_cadastro = datetimeNow();
        $status = 1;

        $query = "INSERT INTO usuario (nome_completo, login, senha, perfil, data_cadastro, status) VALUES('$nome_completo', '$login', '$senha', '$perfil', '$data_cadastro', '$status')";

        if (!$result = mysqli_query($link, $query)) {
            exit(mysqli_error($link));
        }
        echo "Usuário Adicionado!";
    }
?>
