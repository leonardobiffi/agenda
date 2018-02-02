<?php
    // include Database connection file
    require_once("../config.php");
    include(DB_PATH);

    $nome_pesquisa = $_POST['nome_pesquisa'];

    // Design initial table header
    $data = '<div class="table-fixed">
              <table class="table">
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
                <tbody id="tableClientes">';

    $query = "SELECT cliente.id as id_cliente, cliente.nome as nome_completo, empresa.nome as nome_empresa, cliente.celular as celular, cliente.telefone1 as telefone, email FROM cliente INNER JOIN empresa ON empresa.id=cliente.empresa ";

    if (strlen($nome_pesquisa) > 0) {
        $nome_pesquisa = $nome_pesquisa . '%';
        $query .= " WHERE cliente.nome LIKE '$nome_pesquisa'";
    }

    $query .= " ORDER BY cliente.nome, cliente.data_cadastro LIMIT 30";

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
                    <button onclick="viewCliente('.$row['id_cliente'].')" type="button" rel="tooltip" title="Visualizar" class="btn btn-info">
                        <i class="material-icons">person</i>
                    </button>
                    <button onclick="getCliente('.$row['id_cliente'].')" type="button" rel="tooltip" title="Editar" class="btn btn-success">
                        <i class="material-icons">edit</i>
                    </button>
                    <button onclick="askDeleteCliente('.$row['id_cliente'].')" type="button" rel="tooltip" title="Excluir" class="btn btn-danger">
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
            </table>
            </div>';

    echo $data;
?>
