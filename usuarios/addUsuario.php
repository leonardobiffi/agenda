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
        $admin = ($_POST['admin'] == 0) ? 0 : $_POST['admin'];
        $funcionario = ($_POST['funcionario'] == 0) ? 0 : $_POST['funcionario'];
        $data_cadastro = datetimeNow();
        $status = 1;

        $query = "INSERT INTO usuario (nome_completo, login, senha, id_unidade, id_setor, data_cadastro, admin, patrimonio, n_conformidade, status) VALUES('$nome_usuario', '$login_usuario', '$senha_usuario', '$id_unidade', '$id_setor', '$data_cadastro', '$admin', '$patrimonio', '$n_conformidade', '$status')";

        if (!$result = mysqli_query($con, $query)) {
            exit(mysqli_error($con));
        }
        echo "Usuário Adicionado!";
    }
?>
