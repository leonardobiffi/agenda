// Add Usuario
function addUsuario() {
    // get values
    var nome_completo = $("#nome_completo").val();
    var login = $("#login").val();
    var senha = $("#senha").val();
    var perfil = $("#perfil").val();

    if(senha.length >= 6) {
        // Add Usuarios
        $.post("../usuarios/addUsuario.php", {
            nome_completo: nome_completo,
            login: login,
            senha: senha,
            perfil: perfil

        }, function (data, status) {
            // close the popup
            $("#add_usuario_modal").modal("hide");

            // read records again
            readUsuarios();

            // clear fields from the popup
            $("#nome_completo").val("");
            $("#login").val("");
            $("#senha").val("");
            $("#perfil").val("");
        });
    }
}
// READ Usuarios
function readUsuarios() {
    $.get("../usuarios/readUsuario.php", {}, function (data, status) {
        $(".usuarios_content").html(data);
    });
}


// DETAILS usuario
function getUsuario(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_usuario_id").val(id);

    $.post("../usuarios/getUsuario.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var usuario = JSON.parse(data);

            var delay = 200; //0.2 second
            setTimeout(function() {
              // Assing existing values to the modal popup fields
              $("#update_nome").val(usuario.nome_completo);
              $("#update_login").val(usuario.login);
              $("#update_perfil").val(usuario.perfil);
              $("#update_status").val(usuario.status);

            }, delay);
        }
    );
    // Open modal popup
    $("#update_usuario_modal").modal("show");
}

// UPDATE Usuario
function updateUsuario() {
    // get values
    var nome_completo = $("#update_nome").val();
    var login = $("#update_login").val();
    var perfil = $("#update_perfil").val();
    var status = $("#update_status").val();

    // get hidden field value
    var id = $("#hidden_usuario_id").val();

    // Update Usuario in php file
    $.post("../usuarios/updateUsuario.php", {
            id: id,
            nome_completo: nome_completo,
            login: login,
            perfil: perfil,
            status: status
        },
        function (data, status) {
            // hide modal popup
            $("#update_usuario_modal").modal("hide");
            // reload usuarios
            readUsuarios(); 
        }
    );
}

//VIEW Usuario
function viewUsuario(id) {
  // Add User ID to the hidden field for furture usage
  $("#view_usuario_id").val(id);

  $.post("../usuarios/viewUsuario.php", {
          id: id
      },
      function (data, status) {
          // PARSE json data
          var usuario = JSON.parse(data);

          var delay = 200; //0.2 second
          setTimeout(function() {
            // Assing existing values to the modal popup fields
            $("#view_nome").html(usuario.nome_completo);
            $("#view_login").html(usuario.login);
            $("#view_perfil").html(usuario.perfil);
            $("#view_data_cadastro").html(usuario.data_cadastro);
            $("#view_data_modificacao").html(usuario.data_modificacao);
            //$("#view_ultimo_login").html(usuario.ultimo_login);

            if(usuario.status == 1) {
              $("#view_status").html("Ativo");
            } else {
              $("#view_status").html("Inativo");
            }

          }, delay);
      }
  );
  // Open modal popup
  $("#view_usuario_modal").modal("show");

}

// DETAILS Senha
function getSenha(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_senha_id").val(id);

    var delay = 200; //0.2 second
    setTimeout(function() {
        $("#mudar_senha").val("");
        $("#confirmar_senha").val("");
        $("#divCheckSenha").html("");
    }, delay);

    
    // Open modal popup
    $("#update_senha_modal").modal("show");
}

// UPDATE Usuario
function updateSenha() {
    // get values
    var senha = $("#mudar_senha").val();
    var confirmar_senha = $("#confirmar_senha").val();

    if(senha == confirmar_senha && senha.length >= 6) {
        // get hidden field value
        var id = $("#hidden_usuario_id").val();

        // Update Usuario in php file
        $.post("../usuarios/updateSenha.php", {
                id: id,
                senha: senha
            },
            function (data, status) {
                // hide modal popup
                $("#update_senha_modal").modal("hide");
            }
        );
    }

}

function checkCriarSenha() {
    var senha = $("#senha").val();

    if(senha.length >= 6) {

        document.getElementById("criar-senha").classList.remove('has-error');
        document.getElementById("criar-senha").classList.add('has-success');
        document.getElementById("ico-criar-senha").innerHTML = "done";
    } 

    else {

        document.getElementById("criar-senha").classList.add('has-error');
        document.getElementById("criar-senha").classList.remove('has-success');
        document.getElementById("ico-criar-senha").innerHTML = "clear";
    }
}


function checkSenha() {
    var senha = $("#mudar_senha").val();

    if(senha.length >= 6) {

        document.getElementById("new-senha").classList.remove('has-error');
        document.getElementById("new-senha").classList.add('has-success');
        document.getElementById("ico-new-senha").innerHTML = "done";
    } 

    else {

        document.getElementById("new-senha").classList.add('has-error');
        document.getElementById("new-senha").classList.remove('has-success');
        document.getElementById("ico-new-senha").innerHTML = "clear";
    }
}

function checkConfirmarSenha() {
    var senha = $("#mudar_senha").val();
    var confirmar_senha = $("#confirmar_senha").val();

    if(senha != confirmar_senha || senha.length < 6) {

        document.getElementById("conf-senha").classList.add('has-error');
        document.getElementById("conf-senha").classList.remove('has-success');
        document.getElementById("ico-conf-senha").innerHTML = "clear";
    }

    else {

        document.getElementById("conf-senha").classList.remove('has-error');
        document.getElementById("conf-senha").classList.add('has-success');
        document.getElementById("ico-conf-senha").innerHTML = "done";
    }

}

// DELETE Usuario
function deleteUsuario() {
    var id = $("#delete_usuario_id").val();
    $.post("../usuarios/deleteUsuario.php", {
            id: id
        },
        function (data, status) {
            // reload usuarios
            readUsuarios();
        }
    );
    $("#delete_usuario_modal").modal("hide");
}

function askDeleteUsuario(id) {
  // Add User ID to the hidden field for furture usage
  $("#delete_usuario_id").val(id);
  // Open modal popup
  $("#delete_usuario_modal").modal("show");
}

// READ records on page load
$(document).ready(function () {
    $("#confirmar_senha").keyup(checkConfirmarSenha);
    $("#mudar_senha").keyup(checkSenha);
    $("#senha").keyup(checkCriarSenha);
    readUsuarios(); // calling function
});
