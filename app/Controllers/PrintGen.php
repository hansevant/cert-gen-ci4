<?php

namespace App\Controllers;

// use App\Models\ModelUsers; 
use Mpdf\Mpdf;

class PrintGen extends BaseController
{
    public function cetak($userId)
    {
        // Baca HTML dari template sertifikat
        $mpdf = new \Mpdf\Mpdf();

        // Write some HTML code:
        $mpdf->WriteHTML('Hello World');
        
        // Output a PDF file directly to the browser
        $mpdf->Output();
    }

}
