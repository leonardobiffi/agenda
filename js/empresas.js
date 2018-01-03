// Add Empresa
function addEmpresa() {
    // get values
    var nome = $("#nome").val();
    var cnpj = $("#cnpj").val();
    var bairro = $("#bairro").val();
    var estado = $("#uf_estado").val();
    var cidade = $("#id_cidade").val();
    var endereco = $("#endereco").val();
    var numero = $("#numero").val();
    var telefone = $("#telefone").val();
    var celular = $("#celular").val();

    // Add Empresa
    $.post("../empresas/addEmpresa.php", {
        nome: nome,
        cnpj: cnpj,
        bairro: bairro,
        estado: estado,
        cidade: cidade,
        endereco: endereco,
        numero: numero,
        telefone: telefone,
        celular: celular

    }, function (data, status) {
        // close the popup
        $("#add_empresa_modal").modal("hide");

        // read records again
        readEmpresas();

        // clear fields from the popup
        $("#nome").val("");
        $("#cnpj").val("");
        $("#bairro").val("");
        $("#estado").val("");
        $("#cidade").val("");
        $("#endereco").val("");
        $("#numero").val("");
        $("#telefone").val("");
        $("#celular").val("");
    });
}

// READ Empresas
function readEmpresas() {
    $.get("../empresas/readEmpresa.php", {}, function (data, status) {
        $(".empresas_content").html(data);
    });
}

// DETAILS Empresa
function getEmpresa(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_empresa_id").val(id);

    indexEstadosUpdate("update_estado", 'indexCidadesUpdate(this.value,"update_cidade");');

    $.post("../empresas/getEmpresa.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var empresa = JSON.parse(data);

            indexCidadesUpdate(empresa.estado, "update_cidade");

            var delay = 200; //0.2 second
            setTimeout(function() {
              // Assing existing values to the modal popup fields
              $("#update_nome").val(empresa.nome);
              $("#update_cnpj").val(empresa.cnpj);
              $("#update_bairro").val(empresa.bairro);
              $("#update_endereco").val(empresa.endereco);
              $("#update_numero").val(empresa.numero);
              $("#update_telefone").val(empresa.telefone);
              $("#update_celular").val(empresa.celular);
              $("#update_estado").val(empresa.estado);
              $("#update_cidade").val(empresa.cidade);
              $("#update_status").val(empresa.status);

            }, delay);
        }
    );
    // Open modal popup
    $("#update_empresa_modal").modal("show");
}

// UPDATE Empresa
function updateEmpresa() {
    // get values
    var nome = $("#update_nome").val();
    var cnpj = $("#update_cnpj").val();
    var bairro = $("#update_bairro").val();
    var endereco = $("#update_endereco").val();
    var numero = $("#update_numero").val();
    var telefone = $("#update_telefone").val();
    var celular = $("#update_celular").val();
    var estado = $("#update_estado").val();
    var cidade = $("#update_cidade").val();
    var status = $("#update_status").val();
    
    // get hidden field value
    var id = $("#hidden_empresa_id").val();

    // Update Empresa in php file
    $.post("../empresas/updateEmpresa.php", {
            id: id,
            nome: nome,
            cnpj: cnpj,
            bairro: bairro,
            endereco: endereco,
            numero: numero,
            telefone: telefone,
            celular: celular,
            estado: estado,
            cidade: cidade,
            status: status
        },
        function (data, status) {
            // hide modal popup
            $("#update_empresa_modal").modal("hide");
            // reload usuarios
            readEmpresas(); 
        }
    );
}

//VIEW Empresa
function viewEmpresa(id) {
  // Add User ID to the hidden field for furture usage
  $("#view_empresa_id").val(id);

  $.post("../empresas/viewEmpresa.php", {
          id: id
      },
      function (data, status) {
          // PARSE json data
          var empresa = JSON.parse(data);

          var delay = 200; //0.2 second
          setTimeout(function() {
            // Assing existing values to the modal popup fields
            $("#view_nome").html(empresa.nome_empresa);
            $("#view_cnpj").html(empresa.cnpj);
            $("#view_endereco").html(empresa.endereco);
            $("#view_bairro").html(empresa.bairro);
            $("#view_numero").html(empresa.numero);
            $("#view_cidade").html(empresa.nome_cidade);
            $("#view_estado").html(empresa.estado);
            $("#view_telefone").html(empresa.telefone);
            $("#view_celular").html(empresa.celular);
            $("#view_data_cadastro").html(empresa.data_cadastro);
            $("#view_data_modificacao").html(empresa.data_modificacao);
            //$("#view_ultimo_login").html(usuario.ultimo_login);

            if(empresa.status == 1) {
              $("#view_status").html("Ativo");
            } else {
              $("#view_status").html("Inativo");
            }

          }, delay);
      }
  );
  // Open modal popup
  $("#view_empresa_modal").modal("show");

}

// DELETE Empresa
function deleteEmpresa() {
    var id = $("#delete_empresa_id").val();
    $.post("../empresas/deleteEmpresa.php", {
            id: id
        },
        function (data, status) {
            // reload usuarios
            readEmpresas();
        }
    );
    $("#delete_empresa_modal").modal("hide");
}

function askDeleteEmpresa(id) {
  // Add User ID to the hidden field for furture usage
  $("#delete_empresa_id").val(id);
  // Open modal popup
  $("#delete_empresa_modal").modal("show");
}

// INDEX Estados
function indexEstados(id,func) {
    $.post("../empresas/indexEstados.php", {
          id: id,
          func: func
        },
        function (data, status) {
          $(".index_estados_content").html(data);
        }
    );
}

function indexEstadosUpdate(id, func) {
    $.post("../empresas/indexEstados.php", {
          id: id,
          func: func
        },
        function (data, status) {
          $(".index_estados_update_content").html(data);
        }
    );
}

// INDEX Cidades
function indexCidades(uf, id = null) {
    $.post("../empresas/indexCidades.php", {
          uf: uf,
          id: id
        },
        function (data, status) {
          $(".index_cidades_content").html(data);
        }
    );
}

function indexCidadesUpdate(uf, id = null) {
    $.post("../empresas/indexCidades.php", {
          uf: uf,
          id: id
        },
        function (data, status) {
          $(".index_cidades_update_content").html(data);
        }
    );
}

// READ records on page load
$(document).ready(function () {
    
    indexEstados("uf_estado", "indexCidades(this.value);");
    readEmpresas(); // calling function

    jQuery(function($) {
        $.mask.definitions['~']='[+-]';
        $('#cnpj').mask('99.999.999/9999-99');
        $('#telefone').mask('(99) 9999-9999');
        $('#celular').mask('(99) 99999-9999');
        $('#update_cnpj').mask('99.999.999/9999-99');
        $('#update_telefone').mask('(99) 9999-9999');
        $('#update_celular').mask('(99) 99999-9999');
    });
});
