<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/alertify.css">
    <link rel="stylesheet" href="plugin/datatables/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="plugin/datatables/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="plugin/datatables/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="plugin/datatables/css/select.bootstrap.min.css">
</head>

<body>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addnew" onclick="limpiar()">
                <span class="glyphicon glyphicon-plus">Nuevo registro</span>
            </button>

            <table class="table table-bordered table-striped" style="margin-top: 20px;" id="tablaempleado" name="tablaempleado">
                <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                    <th>Carrera</th>
                    <th>Pais</th>
                    <th>Logo</th>
                    <th>Accion</th>
                </thead>
                <tbody>


                </tbody>

            </table>

        </div>
    </div>

    <?php
    include_once "modal.php";
    ?>
    <script src="js/alertify.js"></script>
    <script src="js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
        <!-- dtatables -->
    <script src="plugin/datatables/js/jquery.dataTables.min.js"></script>
    <script src="plugin/datatables/js/dataTables.buttons.min.js"></script>
    <script src="plugin/datatables/js/buttons.html5.min.js"></script>
    <script src="plugin/datatables/js/buttons.colVis.min.js"></script>  
    <script src="plugin/datatables/js/jszip.min.js"></script> 
    <script src="plugin/datatables/js/pdfmake.min.js"></script>
    <script src="plugin/datatables/js/vfs_fonts.js"></script>
    <script src="plugin/datatables/js/bootbox.min.js"></script>
    <script src="plugin/datatables/js/dataTables.buttons.min.js"></script>
    <script src="plugin/datatables/js/select.bootstrap.min.js"></script>
    <script type="text/javascript" src="js/crud.js"></script>

</body>

</html>
