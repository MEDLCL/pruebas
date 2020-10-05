function init() {

}

function grabar() {
    // e.preventDefault();
    var form = new FormData($("#formulario")[0]);
    $.ajax({
        url: "crud.php?agregar=1",
        type: "POST",
        data: form,
        contentType: false,
        processData: false,
        success: function(datos) {
            alert(datos);
        }
    });
    //  limpiar();
}

function limpiar() {
    $("#nombre").val("");
    $("#apellido").val("");
    $("#carrera").val("");
    $("#telefono").val("");
    $("#pais").val("");
    $("#idempleado").val("");
}

function mostrar(id) {
    //  limpiar();
    $.post("crud.php", { id: id },
        function(data, status) {
            data = JSON.parse(data);
            $("#nombre").val(data.Nombres);
            $("#apellido").val(data.Apellidos);
            $("#carrera").val(data.Carrera);
            $("#telefono").val(data.Telefono);
            $("#pais").val(data.Pais);
            $("#idempleado").val(data.idEmp);
        })
}