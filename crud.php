<?php
require_once "dbconect.php";

$id = isset($_POST["id"]) ?$_POST["id"] : 0;
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
$apellido = isset($_POST["apellidos"]) ?$_POST["apellidos"] :"";
$telefono = isset($_POST["telefono"]) ? $_POST["telefono"] :"";
$carrera = isset($_POST["carrera"]) ?$_POST["carrera"] :"";
$pais = isset($_POST["pais"]) ?$_POST["pais"] : "";
$imagen = isset($_POST["imagen"])?$_POST["imagen"]:"";

if (isset($_GET["op"])) {
    if ($_GET["op"] == "agregar") {
        if (!file_exists($_FILES["imagen"]["tmp_name"]) || !is_uploaded_file($_FILES["imagen"]["tmp_name"])){
            $imagen = $_POST["imagenactual"];
        }else{
             //$ext = explode( '.',$_FILES['imagen']['name']);
             $ext = strtolower(pathinfo($_FILES["imagen"]["name"],PATHINFO_EXTENSION));   
             $ext_valida = array('jpeg','jpg','git','png');
             if (in_array($ext,$ext_valida)){
             //if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png"){    
                 $imagen = round(microtime(true)).'.'.$ext;
                 move_uploaded_file($_FILES['imagen']['tmp_name'],"img/".$imagen);
             }
        }

        if ( $id== "0" ||  $id=="" ) {
            $con = Conexion::getConexion();
            $stm = $con->prepare("INSERT INTO empleados (Nombres,Apellidos,Telefono,Carrera,Pais,logo)values(:nom,:ape,:tel,:carr,:pais,:logo)");
            $stm->bindParam(":nom", $nombre);
            $stm->bindParam(":ape", $apellido);
            $stm->bindParam(":tel", $telefono);
            $stm->bindParam(":carr", $carrera);
            $stm->bindParam(":pais", $pais);
            $stm->bindParam(":logo",$imagen);
            $stm->execute();
            $con = Conexion::cerrar();
            echo "Datos Ingresados con exito";
        } else {
            try {

                $con = Conexion::getConexion();
                //$stm = $con->prepare("UPDATE empleados SET Nombres = '$nombre',Apellidos = '$apellido',Telefono = '$telefono',Carrera= '$carrera',Pais = '$pais' WHERE idEmp = '$id'");
                $stm = $con->prepare("UPDATE empleados 
                                SET Nombres = :nom,
                                    Apellidos = :ape,
                                    Telefono = :tel,
                                    Carrera= :carr,
                                    Pais = :pais,
                                    logo = :logo
                                 WHERE idEmp = :idemp");
                $stm->bindParam(":nom", $nombre);
                $stm->bindParam(":ape", $apellido);
                $stm->bindParam(":tel", $telefono);
                $stm->bindParam(":carr", $carrera);
                $stm->bindParam(":pais", $pais);
                $stm->bindParam(":logo",$imagen);
                $stm->bindParam(":idemp", $_POST["id"]);
                $stm->execute();
                $con = Conexion::cerrar();
                echo "Datos Actualizados con exito";
            } catch (\Throwable $th) {
                echo $th->getMessage();
            }
        }
    }
    if ($_GET["op"] == "buscaid") {
        $con = Conexion::getConexion();
        $stmt = $con->query("SELECT * FROM empleados where idEmp = '$id' ");
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_OBJ);
        echo json_encode($res);
    }

    if ($_GET["op"] == "borrar") {
        $con = Conexion::getConexion();
        $stmt = $con->prepare("DELETE  FROM empleados where idEmp = '$id' ");
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            echo "Empleado Eliminado";
        } else {
            echo "Error al eliminar";
        }
    }
    if ($_GET["op"] == "listar") {
        $data = Array();
        $con = Conexion::getConexion();
        $stmt = $con->query("SELECT * FROM empleados");
        $stmt->execute();
        $stmt= $stmt->fetchAll(PDO::FETCH_OBJ);
        foreach ($stmt as $row) {
            $data[]=array(
                "0" => $row->idEmp,
                "1" => $row->Nombres,
                "2" => $row->Apellidos,
                "3" => $row->Telefono,    
                "4" => $row->Carrera,
                "5" => $row->Pais,
                "6" => "<img src='img/".$row->logo."' height ='50px' widht = '50px'>",
                "7" => '<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addnew" name="grabar" id="grabar" onclick="mostrar('.$row->idEmp.')"><span class=" glyphicon glyphicon-edit">Editar</span></button>'.
                '<button class="btn btn-danger btn-sm" name="borra" id="borra" onclick="borrar('.$row->idEmp.')"><span class=" glyphicon glyphicon-trash">Editar</span></button>'
            );
        }
        $results = array(
            "sEcho"=>1,//informacion para el datatable
            "iTotalRecords"=>count($data),//enviamos el total al datatable
            "iTotalDisplayRecords"=>count($data),//enviamos total de rgistror a utlizar
            "aaData"=>$data);
            echo json_encode($results);
    }
}