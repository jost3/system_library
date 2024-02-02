<?php
ob_start();
require_once('pdf/examples/tcpdf_include.php');
include("../bd/mostrar_dt.php");
$consulta = "SELECT * FROM libro";
if (isset($_GET['print_pdf'])) {
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
    $pdf->Cell(20, 10, 'ID', 1, 0, 'C', 1);
    $pdf->Cell(50, 10, 'TITULO', 1, 0, 'C', 1);
    $pdf->Cell(40, 10, 'AUTOR', 1, 0, 'C', 1);
    $pdf->Cell(30, 10, 'EDICION', 1, 0, 'C', 1);
    $pdf->Cell(40, 10, 'SECCION', 1, 1, 'C', 1);

    // Datos
    $resultado = mysqli_query($conex, $consulta);
    while ($row = mysqli_fetch_assoc($resultado)) {
        $pdf->Cell(20, 10, $row["id"], 1, 0, 'C');
        $pdf->Cell(50, 10, $row["titulo"], 1, 0, 'C');
        $pdf->Cell(40, 10, $row["autor"], 1, 0, 'C');
        $pdf->Cell(30, 10, $row["edicion"], 1, 0, 'C');
        $pdf->Cell(40, 10, $row["descripcion"], 1, 1, 'C');
    }

    // Nombre del archivo PDF
    $pdfFileName = 'lista_libros.pdf';

   // Salida del PDF (descarga o visualización)
   $pdf->Output($pdfFileName, 'D');
   exit;
   ob_end_clean();
}
?>
