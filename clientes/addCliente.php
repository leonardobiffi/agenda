<?php
    // include Database connection file
    require_once("../config.php");
    include(DB_PATH);

    if(isset($_POST['nome']))
    {

        // get values
        $nome = $_POST['nome'];
        $nascimento = $_POST['nascimento'];
        $empresa = $_POST['empresa'];
        $cidade = $_POST['cidade'];
        $cep = $_POST['cep'];
        $uf = $_POST['uf'];
        $endereco = $_POST['endereco'];
        $bairro = $_POST['bairro'];
        $ddd = $_POST['ddd1'];
        $fone = $_POST['telefone1'];
        $ddd1 = $_POST['ddd2'];
        $fone1 = $_POST['telefone2'];
        $obs = $_POST['obs'];
        $data_cadastro = datetimeNow();

        $query = "INSERT INTO cliente (nome, nascimento, empresa, cidade, cep, uf, endereco, bairro, ddd, fone, ddd1, fone1, data_cadastro, obs) VALUES ('$nome', '$nascimento', '$empresa', '$cidade', '$cep', UPPER('$uf'), '$endereco', '$bairro', '$ddd', '$fone', '$ddd1', '$fone1', '$data_cadastro', '$obs')";

        if (!$result = mysqli_query($link, $query)) {
            exit(mysqli_error($link));
        }
        echo "Empresa Adicionado!";
    }
?>
