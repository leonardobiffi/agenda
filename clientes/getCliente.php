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
      $query = "SELECT * FROM cliente WHERE id = '$id'";
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
