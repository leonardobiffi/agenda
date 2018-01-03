<?php
    // include Database connection file
    require_once("../config.php");
    include(DB_PATH);

    // Design initial table header
    $data = '<table class="table">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>Nome Completo</th>
                        <th>Empresa</th>
                        <th>Celular</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th class="text-right">Ações</th>
                    </tr>
                </thead>
                <tbody>';

    $query = "SELECT cliente.id as id_cliente, cliente.nome as nome_completo, empresa.nome as nome_empresa, cliente.celular as celular, cliente.telefone1 as telefone, email FROM cliente INNER JOIN empresa ON empresa.id=cliente.empresa ORDER BY cliente.nome";

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
                <td class="text-center">'.$row['id_cliente'].'</td>
                <td>'.$row['nome_completo'].'</td>
                <td>'.$row['nome_empresa'].'</td>
                <td>'.$row['celular'].'</td>
                <td>'.$row['telefone'].'</td>
                <td>'.$row['email'].'</td>
                <td class="td-actions text-right">
                    <button onclick="viewCliente('.$row['id_cliente'].')" type="button" rel="tooltip" title="Visualizar" class="btn btn-info btn-simple btn-xs">
                        <i class="material-icons">person</i>
                    </button>
                    <button onclick="getCliente('.$row['id_cliente'].')" type="button" rel="tooltip" title="Editar" class="btn btn-success btn-simple btn-xs">
                        <i class="material-icons">edit</i>
                    </button>
                    <button onclick="askDeleteCliente('.$row['id_cliente'].')" type="button" rel="tooltip" title="Excluir" class="btn btn-danger btn-simple btn-xs">
                        <i class="material-icons">delete</i>
                    </button>
                </td>
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
