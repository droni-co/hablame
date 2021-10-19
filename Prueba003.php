<?php

//PRUEBA PHP NUMERO 3


// USANDO LA LIBRERIA DE http://www.fpdf.org/
// GENERA UN PDF SIMULANDO UNA FACTURA DE VENTA (formato muy basico) incluyendo una imagen, texto, cuadros


require __DIR__ . '/vendor/autoload.php';
use Fpdf\Fpdf;

class InvoicePdf extends Fpdf
{
  public function __construct(
      $orientation = 'P',
      $unit = 'mm',
      $size = 'letter'
  ) {
    parent::__construct( $orientation, $unit, $size );
  }

  public function BasicTable($header, $data)
  {
      // Cabecera
      foreach($header as $col)
          $this->Cell(50,7,$col,1);
      $this->Ln();
      // Datos
      $this->SetFont('Arial','I',12);
      foreach($data as $row)
      {
          foreach($row as $col)
              $this->Cell(50,6,$col,1);
          $this->Ln();
      }
  }
}
$pdf = new InvoicePdf();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Image('./assets/hablame.png',120,0,80);
$pdf->Cell(40,10,'Hablame te conecta con el mundo!');
/* Tabla */
$pdf->SetY(30);
$header = ['Producto', 'Precio', 'Cantidad', 'Total'];
$data = [
  ['Prod uno', '$15.400', 2, '$30.154'],
  ['Prod dos', '$15.400', 2, '$30.154'],
  ['Tercero', '$15.400', 2, '$30.154'],
  ['Pureba 4', '$15.400', 2, '$30.154']
];
$pdf->BasicTable($header,$data);
$pdf->Output();


?>