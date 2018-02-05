<?php
  // include Database connection file
  require_once("../config.php");
  include(DB_PATH);

  // check request
  if(isset($_POST))
  {
      // get values
      $id = $_POST['id'];
      $nome = $_POST['nome'];
      $empresa = $_POST['empresa'];
      $endereco = $_POST['endereco'];
      $nascimento = $_POST['nascimento'];
      $bairro = $_POST['bairro'];
      $cep = $_POST['cep'];
      $cidade = $_POST['cidade'];
      $uf = $_POST['uf'];
      $ddd = $_POST['ddd1'];
      $fone = $_POST['telefone1'];
      $ddd1 = $_POST['ddd2'];
      $fone1 = $_POST['telefone2'];
      $obs = $_POST['observacao'];
      $data_modificacao = datetimeNow();

      // Update Usuario
      $query = "UPDATE cliente SET nome = '$nome', nascimento = '$nascimento', empresa = '$empresa', endereco = '$endereco', bairro = '$bairro', cep = '$cep', cidade = '$cidade', uf = UPPER('$uf'), ddd = '$ddd', fone = '$fone', ddd1 = '$ddd1', fone1 = '$fone1', data_modificacao = '$data_modificacao', obs  = '$obs' WHERE id = '$id'";

      if (!$result = mysqli_query($link, $query)) {
          exit(mysqli_error($link));
      }
  }