<?php
    // include Database connection file
    require_once("../config.php");
    include(DB_PATH);

    if(isset($_POST['nome']) && isset($_POST['cnpj']) && isset($_POST['endereco']))
    {

        // get values
        $nome = $_POST['nome'];
        $cnpj = $_POST['cnpj'];
        $bairro = $_POST['bairro'];
        $estado = $_POST['estado'];
        $cidade = $_POST['cidade'];
        $endereco = $_POST['endereco'];
        $numero = $_POST['numero'];
        $telefone = $_POST['telefone'];
        $celular = $_POST['celular'];
        $data_cadastro = datetimeNow();
        $status = 1;

        $query = "INSERT INTO empresa (nome, cnpj, bairro, estado, cidade, endereco, numero, telefone, celular, data_cadastro, status) VALUES('$nome', '$cnpj', '$bairro', '$estado', '$cidade', '$endereco', '$numero','$telefone', '$celular', '$data_cadastro', '$status')";

        if (!$result = mysqli_query($link, $query)) {
            exit(mysqli_error($link));
        }
        echo "Empresa Adicionado!";
    }
?>
