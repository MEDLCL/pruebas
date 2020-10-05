<?php
    require_once "dbconect.php";

$id = isset($_POST["id"])? $id = $_POST["id"]:$id =0;

$nombre = isset($_POST["nombre"])? $id = $_POST["nombre"]:$nombre ="0";
$apellido = isset($_POST["apellidos"])? $id = $_POST["apellidos"]:$apellido ="0";
$telefono= isset($_POST["telefono"])? $id = $_POST["telefono"]:$telefono ="0";
$carrera = isset($_POST["carrera"])? $id = $_POST["carrera"]:$carrera ="";
$pais = isset($_POST["pais"])? $id = $_POST["pais"]:$pais ="";


if (isset ($_GET["agregar"])){
    $con = Conexion::getConexion();
    $stm= $con->prepare("INSERT INTO empleados (Nombres,Apellidos,Telefono,Carrera,Pais)values(:nom,:ape,:tel,:carr,:pais)");
    $stm->bindParam(":nom",$nombre);
    $stm->bindParam(":ape",$apellido);
    $stm->bindParam(":tel",$telefono);
    $stm->bindParam(":carr",$carrera);
    $stm->bindParam(":pais",$pais);
    $stm->execute();
    echo "exito";
}


if ($id <> 0) {
   $con = Conexion::getConexion(); 
   $stmt = $con->query("SELECT * FROM empleados where idEmp = '$id' ");
   $stmt->execute();
   $res =$stmt->fetch(PDO::FETCH_OBJ);
   echo  json_encode($res);
}
 

?>