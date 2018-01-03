<?php
    // include Database connection file
    require_once("../config.php");
    include(DB_PATH);

    $id = $_POST['id'];

    // Design initial table header
    $data = "<select type='text' id='".$id."' class='form-control'>
              <option value=''>Selecione a Empresa...</option>";

    $query = "SELECT * FROM empresa ORDER BY nome";

    if (!$result = mysqli_query($link, $query)) {
        exit(mysqli_error($link));
    }

    // if query results contains rows then featch those rows
    if(mysqli_num_rows($result) > 0)
    {
        $number = 1;
        while($row = mysqli_fetch_assoc($result))
        {
            $data .= "<option value='".$row['id']."'>".$row['nome']."</option>";
            $number++;
        }
    }
    else
    {
        // records now found
        $data .= "Registros não encontrados!";
    }

    $data .= "</select>";

    echo $data;
?>
