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
      $cnpj = $_POST['cnpj'];
      $bairro = $_POST['bairro'];
      $endereco = $_POST['endereco'];
      $numero = $_POST['numero'];
      $telefone = $_POST['telefone'];
      $celular = $_POST['celular'];
      $estado = $_POST['estado'];
      $cidade = $_POST['cidade'];
      $status = $_POST['status'];
      $data_modificacao = datetimeNow();

      // Update Usuario
      $query = "UPDATE empresa SET nome = '$nome', cnpj = '$cnpj', bairro = '$bairro', endereco = '$endereco', numero = '$numero', telefone = '$telefone', celular = '$celular', estado = '$estado', cidade = '$cidade', status = '$status', data_modificacao = '$data_modificacao' WHERE id = '$id'";

      if (!$result = mysqli_query($link, $query)) {
          exit(mysqli_error($link));
      }
  }