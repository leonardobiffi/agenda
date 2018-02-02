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
                        <th>Nome</th>
                        <th>CNPJ</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Bairro</th>
                        <th class="text-right">Ações</th>
                    </tr>
                </thead>
                <tbody id="tableEmpresas">';

    $query = "SELECT empresa.id as id_empresa, empresa.nome as nome_empresa, cnpj, cidade.nome as nome_cidade, estado, bairro FROM empresa INNER JOIN cidade ON empresa.cidade=cidade.id";

    if (strlen($nome_pesquisa) > 0) {
        $nome_pesquisa = $nome_pesquisa . '%';
        $query .= " WHERE empresa.nome LIKE '$nome_pesquisa'";
    }

    $query .= " ORDER BY empresa.nome, empresa.data_cadastro LIMIT 30";

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
                <td class="text-center">'.$row['id_empresa'].'</td>
                <td>'.$row['nome_empresa'].'</td>
                <td>'.$row['cnpj'].'</td>
                <td>'.$row['nome_cidade'].'</td>
                <td>'.$row['estado'].'</td>
                <td>'.$row['bairro'].'</td>
                <td class="td-actions text-right">
                    <button onclick="viewEmpresa('.$row['id_empresa'].')" type="button" rel="tooltip" title="Visualizar" class="btn btn-info">
                        <i class="material-icons">person</i>
                    </button>
                    <button onclick="getEmpresa('.$row['id_empresa'].')" type="button" rel="tooltip" title="Editar" class="btn btn-success">
                        <i class="material-icons">edit</i>
                    </button>
                    <button onclick="askDeleteEmpresa('.$row['id_empresa'].')" type="button" rel="tooltip" title="Excluir" class="btn btn-danger">
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
