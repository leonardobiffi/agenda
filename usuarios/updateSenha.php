<?php
  // include Database connection file
  require_once("../config.php");
  include(DB_PATH);

  // check request
  if(isset($_POST))
  {
      // get values
      $id = $_POST['id'];
      $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
      $data_modificacao = datetimeNow();

      // Update Usuario
      $query = "UPDATE usuario SET senha = '$senha', data_modificacao = '$data_modificacao' WHERE id = '$id'";

      if (!$result = mysqli_query($link, $query)) {
          exit(mysqli_error($link));
      }
  }