<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>

<body>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addnew" onclick="limpiar()">
                <span class="glyphicon glyphicon-plus">Nuevo registro</span>
            </button>

            <table class="table table-bordered table-striped" style="margin-top: 20px;">
                <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                    <th>Carrera</th>
                    <th>Pais</th>
                    <th>Accion</th>
                </thead>
                <tbody>
                    <?php 
                    include_once('dbconect.php');

                    $db = Conexion::getConexion();

                    try {
                        $sql = 'SELECT * FROM empleados';
                        foreach ($db->query($sql) as $row) {
                            ?>
                    <tr>
                        <td><?php echo $row['idEmp']; ?></td>
                        <td><?php echo $row['Nombres']; ?></td>
                        <td><?php echo $row['Apellidos']; ?></td>
                        <td><?php echo $row['Telefono']; ?></td>
                        <td><?php echo $row['Carrera']; ?></td>
                        <td><?php echo $row['Pais']; ?></td>
                        <td>
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addnew"
                                name="grabar" id="grabar" onclick="mostrar(<?php echo $row['idEmp'] ?>)">
                                <span class=" glyphicon glyphicon-edit">Editar</span>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addnew"
                                name="grabar" id="grabar" onclick="borrar(<?php echo $row['idEmp'] ?>)">
                                <span class=" glyphicon glyphicon-trash">Borrar</span>
                            </button>
                            
                        </td>
                    </tr>
                    <?php 
                }
            } catch (PDOException $e) {
                echo "Hubo un problema en la conexion: " . $e->getMessage();
            }
            $db = Conexion::cerrar();
            ?>
                </tbody>

            </table>

        </div>
    </div>

    <?php
    include_once "modal.php";
    ?>
    <script src="js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="js/crud.js"></script>
</body>

</html>