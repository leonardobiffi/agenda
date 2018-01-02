<?php
  // include Database connection file
  require_once("../config.php");
  include(DB_PATH);

  // check request
  if(isset($_POST['id']) && isset($_POST['id']) != "")
  {
      // get User ID
      $id = $_POST['id'];

      // Get User Details
      $query = "SELECT empresa.nome as nome_empresa, cnpj, endereco, bairro, numero, cidade.nome as nome_cidade, estado, telefone, celular, status, DATE_FORMAT(data_cadastro, '%d/%m/%Y %H:%i') as data_cadastro, DATE_FORMAT(data_modificacao, '%d/%m/%Y %H:%i') as data_modificacao FROM empresa INNER JOIN cidade ON empresa.cidade=cidade.id WHERE empresa.id = '$id'";

      if (!$result = mysqli_query($link, $query)) {
          exit(mysqli_error($link));
      }
      $response = array();
      if(mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
              $response = $row;
          }
      }
      else
      {
          $response['status'] = 200;
          $response['message'] = "Data not found!";
      }
      // display JSON data
      echo json_encode($response);
  }
  else
  {
      $response['status'] = 200;
      $response['message'] = "Invalid Request!";
  }
