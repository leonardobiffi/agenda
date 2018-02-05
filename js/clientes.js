// Add Cliente
function addCliente() {
    // get values
    var nome = $("#nome").val();
    var nascimento = $("#nascimento").val();
    var empresa = $("#empresa").val();
    var cidade = $("#cidade").val();
    var cep = $("#cep").val();
    var uf = $("#uf").val();
    var endereco = $("#endereco").val();
    var bairro = $("#bairro").val();
    var ddd1 = $("#ddd1").val();
    var telefone1 = $("#telefone1").val();
    var ddd2 = $("#ddd2").val();
    var telefone2 = $("#telefone2").val();
    var observacao = $("#observacao").val();
    

    // Add Cliente
    $.post("../clientes/addCliente.php", {
        nome: nome,
        nascimento: nascimento,
        empresa: empresa,
        cidade: cidade,
        cep: cep,
        uf: uf,
        endereco: endereco,
        bairro: bairro,
        ddd1: ddd1,
        telefone1: telefone1,
        ddd2: ddd2,
        telefone2: telefone2,
        observacao: observacao

    }, function (data, status) {
        // close the popup
        $("#add_cliente_modal").modal("hide");

        // read records again
        readClientes();

        // clear fields from the popup
        $("#nome").val("");
        $("#nascimento").val("");
        $("#empresa").val("");
        $("#cidade").val("");
        $("#cep").val("");
        $("#uf").val("");
        $("#endereco").val("");
        $("#bairro").val("");
        $("#ddd1").val("");
        $("#telefone1").val("");
        $("#ddd2").val("");
        $("#telefone2").val("");
        $("#observacao").val("");
    });
}

// READ Clientes
function readClientes() {

    var nome_pesquisa = $("#nome_pesquisa").val();

    $.post("../clientes/readCliente.php", {
        nome_pesquisa: nome_pesquisa

    }, function (data, status) {
        $(".clientes_content").html(data);
    });
}

// READ Clientes
function readClientesIndex() {
    $.get("clientes/readClienteIndex.php", {}, function (data, status) {
        $(".clientes_index_content").html(data);
    });
}

// DETAILS Cliente
function getCliente(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_cliente_id").val(id);

    indexEmpresasUpdate("update_empresa");

    $.post("../clientes/getCliente.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var cliente = JSON.parse(data);

            var delay = 200; //0.2 second
            setTimeout(function() {
              // Assing existing values to the modal popup fields
              $("#update_nome").val(cliente.nome);
              $("#update_nascimento").val(cliente.nascimento);
              $("#update_empresa").val(cliente.empresa);
              $("#update_endereco").val(cliente.endereco);
              $("#update_bairro").val(cliente.bairro);
              $("#update_cep").val(cliente.cep);
              $("#update_cidade").val(cliente.cidade);
              $("#update_uf").val(cliente.uf);
              $("#update_ddd1").val(cliente.ddd);
              $("#update_telefone1").val(cliente.fone);
              $("#update_ddd2").val(cliente.ddd1);
              $("#update_telefone2").val(cliente.fone1);
              $("#update_observacao").val(cliente.obs);

            }, delay);
        }
    );
    // Open modal popup
    $("#update_cliente_modal").modal("show");
}

// UPDATE Cliente
function updateCliente() {
    // get values
    var nome = $("#update_nome").val();
    var nascimento = $("#update_nascimento").val();
    var empresa = $("#update_empresa").val();
    var endereco = $("#update_endereco").val();
    var bairro = $("#update_bairro").val();
    var cep = $("#update_cep").val();
    var cidade = $("#update_cidade").val();
    var uf = $("#update_uf").val();
    var ddd1 = $("#update_ddd1").val();
    var telefone1 = $("#update_telefone1").val();
    var ddd2 = $("#update_ddd2").val();
    var telefone2 = $("#update_telefone2").val();
    var observacao = $("#update_observacao").val();
    
    // get hidden field value
    var id = $("#hidden_cliente_id").val();

    // Update Cliente in php file
    $.post("../clientes/updateCliente.php", {
            id: id,
            nome: nome,
            nascimento: nascimento,
            empresa: empresa,
            endereco: endereco,
            bairro: bairro,
            cep: cep,
            cidade: cidade,
            uf: uf,
            ddd1: ddd1,
            telefone1: telefone1,
            ddd2: ddd2,
            telefone2: telefone2,
            observacao: observacao
        },
        function (data, status) {
            // hide modal popup
            $("#update_cliente_modal").modal("hide");
            // reload clientes
            readClientes(); 
        }
    );
}

//VIEW Cliente
function viewCliente(id) {
  // Add User ID to the hidden field for furture usage
  $("#view_cliente_id").val(id);

  $.post("../clientes/viewCliente.php", {
          id: id
      },
      function (data, status) {
          // PARSE json data
          var cliente = JSON.parse(data);

          var delay = 200; //0.2 second
          setTimeout(function() {
            // Assing existing values to the modal popup fields
            $("#view_nome").html(cliente.nome);
            $("#view_empresa").html(cliente.empresa);
            $("#view_endereco").html(cliente.endereco);
            $("#view_bairro").html(cliente.bairro);
            $("#view_cep").html(cliente.cep);
            $("#view_cidade").html(cliente.cidade);
            $("#view_uf").html(cliente.uf);
            $("#view_ddd").html(cliente.ddd);
            $("#view_fone").html(cliente.fone);
            $("#view_ddd1").html(cliente.ddd);
            $("#view_fone1").html(cliente.fone);
            $("#view_nascimento").html(cliente.nascimento);
            $("#view_data_cadastro").html(cliente.data_cadastro);
            $("#view_obs").html(cliente.obs);

          }, delay);
      }
  );
  // Open modal popup
  $("#view_cliente_modal").modal("show");

}

// DELETE Cliente
function deleteCliente() {
    var id = $("#delete_cliente_id").val();
    $.post("../clientes/deleteCliente.php", {
            id: id
        },
        function (data, status) {
            // reload usuarios
            readClientes();
        }
    );
    $("#delete_cliente_modal").modal("hide");
}

function askDeleteCliente(id) {
  // Add User ID to the hidden field for furture usage
  $("#delete_cliente_id").val(id);
  // Open modal popup
  $("#delete_cliente_modal").modal("show");
}

// INDEX Empresas
function indexEmpresas(id) {
    $.post("../clientes/indexEmpresas.php", {
          id: id
        },
        function (data, status) {
          $(".index_empresas_content").html(data);
        }
    );
}

function indexEmpresasUpdate(id) {
    $.post("../clientes/indexEmpresas.php", {
          id: id
        },
        function (data, status) {
          $(".index_empresas_update_content").html(data);
        }
    );
}

function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;

    return true;
}


// READ records on page load
$(document).ready(function () {
    
    indexEmpresas("id_empresa");
    readClientes(); // calling function
    readClientesIndex(); // calling function

    jQuery(function($) {
        $.mask.definitions['~']='[+-]';
        $('#cep').mask('99999-999');
        $('#nascimento').mask('99/99/9999');
        $('#telefone1').mask('9999-9999');
        $('#telefone2').mask('9999-9999');
        
        $('#update_cep').mask('99999-999');
        $('#update_nascimento').mask('99/99/9999');
        $('#update_telefone1').mask('9999-9999');
        $('#update_telefone2').mask('9999-9999');

        $("#uf").attr('maxlength','2');
        $("#ddd1").attr('maxlength','3');
        $("#ddd2").attr('maxlength','3');

        $("#update_uf").attr('maxlength','2');
        $("#update_ddd1").attr('maxlength','3');
        $("#update_ddd2").attr('maxlength','3');
    });

});
