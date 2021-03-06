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
                        <th>Usuário</th>
                        <th>Nome Completo</th>
                        <th>Perfil</th>
                        <th class="text-right">Ações</th>
                    </tr>
                </thead>
                <tbody id="tableUsuarios">';

    $query = "SELECT * FROM usuario";

    if (strlen($nome_pesquisa) > 0) {
        $nome_pesquisa = $nome_pesquisa . '%';
        $query .= " WHERE nome_completo LIKE '$nome_pesquisa'";
    }

    $query .= " ORDER BY nome_completo, data_cadastro LIMIT 20";

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
                <td>'.$row['login'].'</td>
                <td>'.$row['nome_completo'].'</td>
                <td>'.$row['perfil'].'</td>
                <td class="td-actions text-right">
                    <button onclick="viewUsuario('.$row['id'].')" type="button" rel="tooltip" title="Visualizar" class="btn btn-info">
                        <i class="material-icons">person</i>
                    </button>
                    <button onclick="getUsuario('.$row['id'].')" type="button" rel="tooltip" title="Editar" class="btn btn-success">
                        <i class="material-icons">edit</i>
                    </button>
                    <button onclick="askDeleteUsuario('.$row['id'].')" type="button" rel="tooltip" title="Excluir" class="btn btn-danger">
                        <i class="material-icons">delete</i>
                    </button>
                    <button onclick="getSenha('.$row['id'].')" type="button" rel="tooltip" title="Alterar Senha" class="btn btn-warning">
                        <i class="material-icons">lock</i>
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
