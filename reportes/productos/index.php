<?php
require "fpdf.php";
require_once("../../db/conexion.php");
class PDF extends FPDF{
  function Header()
{
    // Logo     el 8 define el tama�o el 10 es un tab, el 8 es lineas
    $this->Image('a.jpg',10,8,30);
    $this->Image('a.jpg',170,8,30);
}
}
//CREACION DE LA HOJA
//$years=$_GET['years'];
$pdf = new PDF('P', 'mm','Letter');
$pdf->setMargins(20,18);
$pdf->AliasNbPages();
$pdf->AddPage();

//TITULO
$pdf->SetTextColor(0x00,0x00,0x00);
$pdf->SetFont('Arial','b',7);
$pdf->Cell(0,5,'BOUTIQUE CAROL FASHION',0,1,'C');
$pdf->Cell(0,5,'Productos Registrados ',0,1,'C');


  $pdf->Ln();

  
 
  $pdf->Ln();
  
  //1 indica borde, 0 no hace salto de linea, c es centrado

$result=mysqli_query($link, "select Nombre,precioCompra,precioVenta,categoria,existencia from productos"); 

  
//$result = mysql_query($consulta);
$pdf->Ln();
    //aqui agregue las cabeceras de las tablas
    $pdf->Cell(40,5, "Nombre",1,0,'C');
    $pdf->Cell(30,5, "Precio Compra",1,0,'C');
    $pdf->Cell(30,5, "Precio Venta",1,0,'C');
    $pdf->Cell(40,5, "Categoria",1,0,'C');
    $pdf->Cell(20,5, "Existencia",1,0,'C');
while($row = mysqli_fetch_array($result)){ 
    $pdf->Ln();
    $pdf->Cell(40,5, $row['Nombre'],1,0,'C');
    $pdf->Cell(30,5, $row['precioCompra'],1,0,'C');
    $pdf->Cell(30,5, $row['precioVenta'],1,0,'C');
    $pdf->Cell(40,5, $row['categoria'],1,0,'C');
    $pdf->Cell(20,5, $row['existencia'],1,0,'C');
    
 
 
    //$exec=mysql_query($consulta); 


  
  }  

  mysqli_close($link);
$pdf->Output();
?>