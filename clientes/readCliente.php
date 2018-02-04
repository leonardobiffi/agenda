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
                        <th>DDD</th>
                        <th>Telefone</th>
                        <th>Cidade</th>
                        <th class="text-right">Ações</th>
                    </tr>
                </thead>
                <tbody id="tableClientes">';

    $query = "SELECT id, nome, empresa, ddd, fone, cidade FROM cliente ";

    if (strlen($nome_pesquisa) > 0) {
        $nome_pesquisa = $nome_pesquisa . '%';
        $query .= " WHERE cliente.nome LIKE '$nome_pesquisa'";
    }

    $query .= " ORDER BY cliente.id DESC, cliente.data_cadastro LIMIT 30";

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
                <td class="text-center">'.$row['id'].'</td>
                <td>'.$row['nome'].'</td>
                <td>'.$row['empresa'].'</td>
                <td>'.$row['ddd'].'</td>
                <td>'.$row['fone'].'</td>
                <td>'.$row['cidade'].'</td>
                <td class="td-actions text-right">
                    <button onclick="viewCliente('.$row['id'].')" type="button" rel="tooltip" title="Visualizar" class="btn btn-info">
                        <i class="material-icons">person</i>
                    </button>
                    <button onclick="getCliente('.$row['id'].')" type="button" rel="tooltip" title="Editar" class="btn btn-success">
                        <i class="material-icons">edit</i>
                    </button>
                    <button onclick="askDeleteCliente('.$row['id'].')" type="button" rel="tooltip" title="Excluir" class="btn btn-danger">
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
