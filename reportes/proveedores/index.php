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
$pdf->Cell(0,5,'Proveedores Registrados ',0,1,'C');


  $pdf->Ln();

  
 
  $pdf->Ln();
  
  //1 indica borde, 0 no hace salto de linea, c es centrado

$result=mysqli_query($link, "select empresa,direccion,cp,telefono,email from proveedores"); 

  
//$result = mysql_query($consulta);
$pdf->Ln();
    //aqui agregue las cabeceras de las tablas
    $pdf->Cell(45,5, "Empresa",1,0,'C');
    $pdf->Cell(45,5, "Direccion",1,0,'C');
    $pdf->Cell(25,5, "Codigo postal",1,0,'C');
    $pdf->Cell(20,5, "Telefono",1,0,'C');
    $pdf->Cell(45,5, "Email",1,0,'C');
while($row = mysqli_fetch_array($result)){ 
    $pdf->Ln();
    $pdf->Cell(45,5, $row['empresa'],1,0,'C');
    $pdf->Cell(45,5, $row['direccion'],1,0,'C');
    $pdf->Cell(25,5, $row['cp'],1,0,'C');
    $pdf->Cell(20,5, $row['telefono'],1,0,'C');
    $pdf->Cell(45,5, $row['email'],1,0,'C');
    
 
 
    //$exec=mysql_query($consulta); 


  
  }  

  mysqli_close($link);
$pdf->Output();
?>