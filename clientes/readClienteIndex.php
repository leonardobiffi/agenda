<?php
    // include Database connection file
    require_once("../config.php");
    include(DB_PATH);

    // Design initial table header
    $data = '<table class="table">
                <thead>
                    <tr>
                        <th>Nome Completo</th>
                        <th>Empresa</th>
                        <th>DDD</th>
                        <th>Telefone</th>
                        <th>Cidade</th>
                    </tr>
                </thead>
                <tbody>';

    $query = "SELECT nome, empresa, ddd, fone, cidade FROM cliente ORDER BY cliente.id DESC, cliente.data_cadastro DESC LIMIT 6";

    if (!$result = mysqli_query($link, $query)) {
        exit(mysqli_error($link));
    }

    // if query results contains rows then featch those rows
    if(mysqli_num_rows($result) > 0)
    {
        $number = 1;
        while($row = mysqli_fetch_assoc($result))
        {
            $data .= '
            <tr>
                <td>'.$row['nome'].'</td>
                <td>'.$row['empresa'].'</td>
                <td>'.$row['ddd'].'</td>
                <td>'.$row['fone'].'</td>
                <td>'.$row['cidade'].'</td>
            </tr>';

            $number++;
        }
    }
    else
    {
        // records now found
        $data .= '<tr><td colspan="6">Registros não encontrados!</td></tr>';
    }

    $data .= '</tbody>
            </table>';

    echo $data;
?>
