<?php

    require 'vendor/autoload.php';

    use Dompdf\Dompdf;
    
    $htmlx = $_GET['html'];


    $dompdf = new Dompdf();
    $dompdf->loadHtml($htmlx);

    //(Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream();

    echo "Download was successful";
?>