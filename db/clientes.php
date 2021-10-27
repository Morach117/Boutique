<?php
include_once '../db/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : '';
$telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';


$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO clientes (nombre, apellido, telefono, email) VALUES('$nombre', '$apellido', '$telefono', '$email') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM clientes ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2:        
        $consulta = "UPDATE clientes SET nombre='$nombre', apellido='$apellido', telefono='$telefono', email='$email' WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM clientes WHERE id='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM clientes WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM clientes";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;