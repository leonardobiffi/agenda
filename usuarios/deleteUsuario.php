<?php
// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // include Database connection file
    require_once("../config.php");
    include(DB_PATH);

    // get user id
    $id = $_POST['id'];

    // delete User
    $query = "DELETE FROM usuario WHERE id = '$id'";
    if (!$result = mysqli_query($link, $query)) {
        exit(mysqli_error($link));
    }
}
?>
