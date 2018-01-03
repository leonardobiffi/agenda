<?php
    // include Database connection file
    require_once("../config.php");
    include(DB_PATH);

    if(isset($_POST['nome']) && isset($_POST['cpf']))
    {

        // get values
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $rg = $_POST['rg'];
        $empresa = $_POST['empresa'];
        $email = $_POST['email'];
        $celular = $_POST['celular'];
        $telefone1 = $_POST['telefone1'];
        $telefone2 = $_POST['telefone2'];
        $data_cadastro = datetimeNow();
        $status = 1;

        $query = "INSERT INTO cliente (nome, cpf, rg, empresa, email, celular, telefone1, telefone2, data_cadastro, status) VALUES('$nome', '$cpf', '$rg', '$empresa', '$email', '$celular', '$telefone1','$telefone2', '$data_cadastro', '$status')";

        if (!$result = mysqli_query($link, $query)) {
            exit(mysqli_error($link));
        }
        echo "Empresa Adicionado!";
    }
?>
