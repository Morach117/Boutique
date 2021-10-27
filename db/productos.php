<?php
include_once '../db/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$precioCompra = (isset($_POST['precioCompra'])) ? $_POST['precioCompra'] : '';
$precioVenta = (isset($_POST['precioVenta'])) ? $_POST['precioVenta'] : '';
$categoria = (isset($_POST['categoria'])) ? $_POST['categoria'] : '';
$existencia = (isset($_POST['existencia'])) ? $_POST['existencia'] : '';


$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO productos (nombre, precioCompra, precioVenta, categoria,existencia) VALUES('$nombre', '$precioCompra', '$precioVenta', '$categoria','$existencia') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM productos ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2:        
        $consulta = "UPDATE productos SET nombre='$nombre', precioCompra='$precioCompra', precioVenta='$precioVenta', categoria='$categoria', existencia='$existencia' WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM productos WHERE id='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM productos WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM productos";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;