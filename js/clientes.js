// Add Cliente
function addCliente() {
    // get values
    var nome = $("#nome").val();
    var cpf = $("#cpf").val();
    var rg = $("#rg").val();
    var empresa = $("#id_empresa").val();
    var email = $("#email").val();
    var celular = $("#celular").val();
    var telefone1 = $("#telefone1").val();
    var telefone2 = $("#telefone2").val();
    var observacao = $("#observacao").val();

    // Add Cliente
    $.post("../clientes/addCliente.php", {
        nome: nome,
        cpf: cpf,
        rg: rg,
        empresa: empresa,
        email: email,
        celular: celular,
        telefone1: telefone1,
        telefone2: telefone2,
        observacao: observacao

    }, function (data, status) {
        // close the popup
        $("#add_cliente_modal").modal("hide");

        // read records again
        readClientes();

        // clear fields from the popup
        $("#nome").val("");
        $("#cpf").val("");
        $("#rg").val("");
        $("#empresa").val("");
        $("#email").val("");
        $("#celular").val("");
        $("#telefone1").val("");
        $("#telefone2").val("");
        $("#observacao").val("");
    });
}

// READ Clientes
function readClientes() {
    $.get("../clientes/readCliente.php", {}, function (data, status) {
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
              $("#update_cpf").val(cliente.cpf);
              $("#update_rg").val(cliente.rg);
              $("#update_empresa").val(cliente.empresa);
              $("#update_email").val(cliente.email);
              $("#update_celular").val(cliente.celular);
              $("#update_telefone1").val(cliente.telefone1);
              $("#update_telefone2").val(cliente.telefone2);
              $("#update_status").val(cliente.status);
              $("#update_observacao").val(cliente.observacao);

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
    var cpf = $("#update_cpf").val();
    var rg = $("#update_rg").val();
    var empresa = $("#update_empresa").val();
    var email = $("#update_email").val();
    var celular = $("#update_celular").val();
    var telefone1 = $("#update_telefone1").val();
    var telefone2 = $("#update_telefone2").val();
    var status = $("#update_status").val();
    var observacao = $("#update_observacao").val();
    
    // get hidden field value
    var id = $("#hidden_cliente_id").val();

    // Update Cliente in php file
    $.post("../clientes/updateCliente.php", {
            id: id,
            nome: nome,
            cpf: cpf,
            rg: rg,
            empresa: empresa,
            email: email,
            celular: celular,
            telefone1: telefone1,
            telefone2: telefone2,
            status: status,
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
            $("#view_nome").html(cliente.nome_completo);
            $("#view_cpf").html(cliente.cpf);
            $("#view_rg").html(cliente.rg);
            $("#view_empresa").html(cliente.empresa);
            $("#view_email").html(cliente.email);
            $("#view_celular").html(cliente.celular);
            $("#view_telefone1").html(cliente.telefone1);
            $("#view_telefone2").html(cliente.telefone2);
            $("#view_data_cadastro").html(cliente.data_cadastro);
            $("#view_data_modificacao").html(cliente.data_modificacao);
            $("#view_observacao").html(cliente.observacao);

            if(cliente.status == 1) {
              $("#view_status").html("Ativo");
            } else {
              $("#view_status").html("Inativo");
            }

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


// READ records on page load
$(document).ready(function () {

    $("#buscarClientes").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tableClientes tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    indexEmpresas("id_empresa");
    readClientes(); // calling function
    readClientesIndex(); // calling function

    jQuery(function($) {
        $.mask.definitions['~']='[+-]';
        $('#cpf').mask('999.999.999-99');
        $('#telefone1').mask('(99) 9999-9999');
        $('#telefone2').mask('(99) 9999-9999');
        $('#celular').mask('(99) 99999-9999');
        $('#rg').mask('99.999.999-9');
        $('#agencia').mask('9999-9');
        $('#conta').mask('99.999-9');

        $('#update_cpf').mask('999.999.999-99');
        $('#update_telefone1').mask('(99) 9999-9999');
        $('#update_telefone2').mask('(99) 9999-9999');
        $('#update_celular').mask('(99) 99999-9999');
        $('#update_rg').mask('99.999.999-9');
        $('#update_agencia').mask('9999-9');
        $('#update_conta').mask('99.999-9');
    });

});
