<?php
include_once '../db/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$empresa = (isset($_POST['empresa'])) ? $_POST['empresa'] : '';
$direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : '';
$cp = (isset($_POST['cp'])) ? $_POST['cp'] : '';
$telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';


$opcion = (isset($_POST['opcion'])) ? $_POST['opcion']: '';
$id = (isset($_POST['id'])) ? $_POST['id']:'';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO proveedores (empresa, direccion, cp, telefono, email) VALUES('$empresa', '$direccion','$cp','$telefono', '$email')";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM proveedores ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2:        
        $consulta = "UPDATE proveedores SET empresa='$empresa', direccion='$direccion', cp='$cp', telefono='$telefono', email='$email'WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM proveedores WHERE id='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM proveedores WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM proveedores";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;