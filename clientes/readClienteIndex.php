<?php
    // include Database connection file
    require_once("../config.php");
    include(DB_PATH);

    // Design initial table header
    $data = '<table class="table">
                <thead>
                    <tr>
                        <th>Nome Completo</th>
                        <th>CPF</th>
                        <th>Empresa</th>
                        <th>Celular</th>
                        <th>Telefone</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>';

    $query = "SELECT cliente.id as id_cliente, cliente.nome as nome_completo, empresa.nome as nome_empresa, cliente.celular as celular, cliente.telefone1 as telefone, email, cpf FROM cliente INNER JOIN empresa ON empresa.id=cliente.empresa ORDER BY cliente.data_cadastro DESC LIMIT 5";

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
                <td>'.$row['nome_completo'].'</td>
                <td>'.$row['cpf'].'</td>
                <td>'.$row['nome_empresa'].'</td>
                <td>'.$row['celular'].'</td>
                <td>'.$row['telefone'].'</td>
                <td>'.$row['email'].'</td>
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
