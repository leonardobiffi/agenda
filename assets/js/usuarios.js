// Add Usuario
function addUsuario() {
    // get values
    var nome_completo = $("#nome_completo").val();
    var login = $("#login").val();
    var senha = $("#senha").val();
    var perfil = $("#perfil").val();

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
// READ Usuarios
function readUsuarios() {
    $.get("../usuarios/readUsuario.php", {}, function (data, status) {
        $(".usuarios_content").html(data);
    });
}

// READ records on page load
$(document).ready(function () {
    readUsuarios(); // calling function
});
