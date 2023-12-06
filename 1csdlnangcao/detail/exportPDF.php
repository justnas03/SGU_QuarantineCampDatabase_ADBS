<?php
require_once("../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
use Dompdf\Options;

if (isset($_POST['exportPDF'])) {
    // Create a Dompdf instance
    $dompdf = new Dompdf();

    // Load your HTML content (the content you want to convert to PDF)
    ob_start();
    include('./printDetailPatient.php'); // Include your existing file
    $html = ob_get_clean();

    // Load HTML to Dompdf
    $dompdf->loadHtml($html);

    // Set paper size (optional)
    $dompdf->setPaper('A4', 'portrait');

    // Render PDF (first pass to get total pages)
    $dompdf->render();

    // Output the PDF (force download)
    $dompdf->stream('exported_file.pdf', ['Attachment' => 0]);
    ob_end_clean();
}
?>