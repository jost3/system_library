<?php
ob_start();
require_once('pdf/examples/tcpdf_include.php');
include("../bd/conex_prest.php");
$prestamo = "SELECT * FROM prestamo";
if (isset($_GET['print_pdf1'])) {
    // Configuración de TCPDF
    $pdf = new TCPDF();
    $pdf->SetPrintHeader(false);
    $pdf->SetPrintFooter(false);

    // Agregar una nueva página
    $pdf->AddPage();
    
    // Contenido del PDF
    $pdf->setFont('dejavusans', '', 6, '', true);
    $pdf->Cell(0, 10, 'LISTA DE LIBROS ACTUALED', 0, 1, 'C');

    $pdf->Ln(10);

    // Crear tabla con los datos
    $pdf->SetFillColor(200, 220, 255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->SetLineWidth(0.1);

    // Encabezados
    $pdf->Cell(15, 10, 'ID', 1, 0, 'C', 1);
    $pdf->Cell(30, 10, 'TITULO', 1, 0, 'C', 1);
    $pdf->Cell(20, 10, 'AUTOR', 1, 0, 'C', 1);
    $pdf->Cell(20, 10, 'SECCION', 1, 0, 'C', 1);
    $pdf->Cell(20, 10, 'ESTADO', 1, 0, 'C', 1);
    $pdf->Cell(20, 10, 'FECHA', 1, 0, 'C', 1);
    $pdf->Cell(30, 10, 'DNI', 1, 0, 'C', 1);
    $pdf->Cell(30, 10, 'ESTUDIANTE', 1, 1, 'C', 1);

    // Datos
    $result = mysqli_query($conex1, $prestamo);
    while($row=mysqli_fetch_assoc($result)){
        $pdf->Cell(15, 10, $row["id_prest"], 1, 0, 'C');
        $pdf->Cell(30, 10, $row["titulo1"], 1, 0, 'C');
        $pdf->Cell(20, 10, $row["autor1"], 1, 0, 'C');
        $pdf->Cell(20, 10, $row["descripcion1"], 1, 0, 'C');
        $pdf->Cell(20, 10, $row["estado"], 1, 0, 'C');
        $pdf->Cell(20, 10, $row["fecha"], 1, 0, 'C');
        $pdf->Cell(30, 10, $row["dni_est"], 1, 0, 'C');
        $pdf->Cell(30, 10, $row["nombre"], 1, 1, 'C');
    }

    // Nombre del archivo PDF
    $pdfFileName = 'lista_prestamos.pdf';

   // Salida del PDF (descarga o visualización)
   $pdf->Output($pdfFileName, 'D');
   exit;
   ob_end_clean();
}
?>
