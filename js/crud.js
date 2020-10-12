var tabla;

function init() {
    listarempleado();
}

function grabar() {
    // e.preventDefault();
    var form = new FormData($("#formulario")[0]);
    $.ajax({
        url: "crud.php?op=agregar",
        type: "POST",
        data: form,
        contentType: false,
        processData: false,
        success: function(datos) {

            $('#tablaempleado').DataTable().ajax.reload();
            alertify.success(datos);

        }
    });
    limpiar();
}

function limpiar() {
    $("#nombre").val("");
    $("#apellido").val("");
    $("#carrera").val("");
    $("#telefono").val("");
    $("#pais").val("");
    $("#id").val("0");
    $("#imagenactual").val("")
    $("#imagenmuestra").attr("src", "")
    $("#imagen").val("");
}

function mostrar(id) {
    limpiar();

    $.post("crud.php?op=buscaid", { id: id },
        function(data, status) {
            data = JSON.parse(data);
            $("#nombre").val(data.Nombres);
            $("#apellido").val(data.Apellidos);
            $("#carrera").val(data.Carrera);
            $("#telefono").val(data.Telefono);
            $("#pais").val(data.Pais);
            $("#id").val(data.idEmp);
            $("#imagenactual").val(data.logo);
            $("#imagenmuestra").attr("src", "img/" + data.logo);
        })

}

function borrar(id) {
    // e.preventDefault();
    $.post("crud.php?op=borrar", { id: id },
        function(data, status) {

            $('#tablaempleado').DataTable().ajax.reload();
            alertify.success(data);

        })
}

function listarempleado() {
    tabla = $('#tablaempleado').dataTable({
        "aProcessing": true, //Activamos el procesamiento del datatables
        "aServerSide": true, //Paginacion y fltrado realizado por el servidor
        dom: 'Bfrtip', //Definimos los elementos de control de tabla
        buttons: ['copyHtml5', 'excelHtml5', 'pdfHtml5'],
        "ajax": {
            url: 'crud.php?op=listar',
            type: "get",
            dataType: "json",
            error: function(e) {
                console.log(e.responseText);
            }
        },
        "bDestroy": true,
        "iDisplayLenth": 5, //paginacion
        "order": [
                [0, "desc"]
            ] //order los datos

    });
}
init();