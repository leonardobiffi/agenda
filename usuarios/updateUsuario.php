<?php
  // include Database connection file
  require_once("../config.php");
  include(DB_PATH);

  // check request
  if(isset($_POST))
  {
      // get values
      $id = $_POST['id'];
      $nome_completo = $_POST['nome_completo'];
      $login = $_POST['login'];
      $perfil = $_POST['perfil'];
      $status = $_POST['status'];
      $data_modificacao = datetimeNow();

      // Update Usuario
      $query = "UPDATE usuario SET nome_completo = '$nome_completo', login = '$login', perfil = '$perfil', status = '$status', data_modificacao = '$data_modificacao' WHERE id = '$id'";

      if (!$result = mysqli_query($link, $query)) {
          exit(mysqli_error($link));
      }
  }