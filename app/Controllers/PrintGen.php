<?php

namespace App\Controllers;

// use App\Models\ModelUsers; 
use \Mpdf\Mpdf;

class PrintGen extends BaseController
{
    public function cetak()
    {

        // Your PDF content and settings
        $imagePath = FCPATH . 'templates/t.png';
        // Create an mPDF object
        $mpdf = new Mpdf();

        // Assuming A4 page size: 210 x 297 mm
        $pageWidth = 1382;
        $pageHeight = 1568;

        // Image dimensions to cover the full A4 page
        $imageWidth = $pageWidth;
        $imageHeight = $pageHeight;

        // Add a page to the PDF
        $mpdf->AddPage();

        // Add the image to the PDF, covering the full A4 page
        $mpdf->Image($imagePath, 0, 0, 210, 297, 'png', '', true, false);
        
        // Set the filename as needed
        // $filename = 'image_to_pdf_' . date('YmdHis') . '.pdf';
        
        // Display the PDF in the browser
        // $mpdf->Output($filename, 'D');
        
        $mpdf->Output();
        $this->response->setHeader('Content-Type', 'application/pdf');
        exit();

        // Output a PDF file directly to the browser
        
        // return redirect()->to($mpdf->Output('filename.pdf','F'));
    }

}
