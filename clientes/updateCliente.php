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
      $cpf = $_POST['cpf'];
      $rg = $_POST['rg'];
      $empresa = $_POST['empresa'];
      $email = $_POST['email'];
      $celular = $_POST['celular'];
      $telefone1 = $_POST['telefone1'];
      $telefone2 = $_POST['telefone2'];
      $status = $_POST['status'];
      $data_modificacao = datetimeNow();

      // Update Usuario
      $query = "UPDATE cliente SET nome = '$nome', cpf = '$cpf', rg = '$rg', empresa = '$empresa', email = '$email', telefone1 = '$telefone1', telefone2 = '$telefone2', celular = '$celular', status = '$status', data_modificacao = '$data_modificacao' WHERE id = '$id'";

      if (!$result = mysqli_query($link, $query)) {
          exit(mysqli_error($link));
      }
  }