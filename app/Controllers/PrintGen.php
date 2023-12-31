<?php

namespace App\Controllers;

// use App\Models\ModelUsers; 
use \Mpdf\Mpdf;
use App\Models\ModelUsers; 

class PrintGen extends BaseController
{
    public function surket($userId)
    {
        if(!session()->get('session')){
            return redirect()->to('');
        }

        $model = new ModelUsers();
        $builder = $model->join('labs', 'labs.lab_id = users.lab_id');
        $builder->select('*'); // Select specific columns, adjust as needed
    
        // Add a WHERE clause to filter by user ID
        $builder->where('users.user_id', $userId);
    
        $data['results'] = $builder->get()->getResult();

        // dd($data['results'][0]);

        // Your PDF content and settings
        $font = FCPATH . "fonts/Inter-Medium.ttf";
        $image = imagecreatefrompng(FCPATH . 'templates/sk.png');

        // Create an mPDF object
        $textColour = imagecolorallocate($image, 0, 0, 0); // RGB color
        $sk = $data['results'][0]->sk;
        $name = $data['results'][0]->name;
        $alamat = $data['results'][0]->alamat;
        $ttl = $data['results'][0]->ttl;
        $lab_name = $data['results'][0]->lab_name;
        $praktikum = $data['results'][0]->praktikum;
        $period = $data['results'][0]->period;
        $role =  $data['results'][0]->role;

        // biar rapih aja paragrafnya dicek jumlah kata trus kasih logic newlinenya biar beda
        if(strlen($praktikum) > 45){
            $desc = "Adalah benar ". $role ." di Laboratorium Psikologi ". $lab_name ."\n\nPraktikum ". $praktikum ." Fakultas Psikologi\n\nUniversitas Gunadarma pada Semester ". $period ;
        }else{
            $desc = "Adalah benar ". $role ." di Laboratorium Psikologi ". $lab_name ."\n\nPraktikum ". $praktikum ." Fakultas Psikologi Universitas Gunadarma\n\npada Semester ". $period ;
        }

        imagettftext($image, 40, 0, 1070, 1580, $textColour, $font, $name);
        imagettftext($image, 40, 0, 1070, 1680, $textColour, $font, substr($alamat, 0 ,45)); //motong alamat
        imagettftext($image, 40, 0, 1070, 1790, $textColour, $font, $ttl);

        // Save the image to a temporary file
        $imageFileName = WRITEPATH . 'uploads/' . $name . ".jpg";
        imagejpeg($image, $imageFileName);
        imagedestroy($image);

        $pdf = new Mpdf();
        $pdf->AddPage();
        $pdf->Image($imageFileName, 0, 0, 210, 297, 'png', '', true, false);
        $pdf->SetMargins(10, 10, 10);

        // Add additional alamat using mPDF (backup kalau mau dikasih spasi kebawah)
        // $pdf->SetFont($font, '', 14);
        // $pdf->SetXY(93.5, 145); // Adjust X, Y position as needed
        // $pdf->WriteCell(0, 4, substr($alamat, 0,44), 0,);

        // Add additional desc using mPDF
        $pdf->SetFont($font, '', 14);
        $pdf->SetXY(7, 175); // Adjust X, Y position as needed
        $pdf->MultiCell(0, 4, $desc, 0, 'C');

        // Add additional no sk using mPDF
        $pdf->SetFont($font, '', 16);
        $pdf->SetXY(7, 111); // Adjust X, Y position as needed
        $pdf->MultiCell(0, 4, $sk, 0, 'C');

        // Add additional date using mPDF
        $time = "Depok, " . date('d F Y');
        $pdf->SetFont($font, '', 12);
        $pdf->SetXY(135, 235); // Adjust X, Y position as needed
        $pdf->WriteCell(0, 4, $time, 0);

        if($data['results'][0]->lab_id == 1){
            $kepala_lab = "Dr. Anugriaty Indah Asmarany, M.Si";
        } elseif ($data['results'][0]->lab_id == 2){
            $kepala_lab = "Dr. Hally Weliangan, M.Psi., Psikolog.";
        } elseif ($data['results'][0]->lab_id == 3){
            $kepala_lab = "Dr. Ursa Majorsy, S.Psi., M.Si";
        } else{
            $kepala_lab = "Unknown";
        }
        // Add additional Kepala lab using mPDF
        $pdf->SetFont($font, '', 12, false,);
        $pdf->SetXY(125, 272); // Adjust X, Y position as needed
        $pdf->WriteCell(0, 4, $kepala_lab, 0, 0, 'C');

        if($data['results'][0]->lab_id == 1){
            $lab = "Kepala Laboratorium Psikologi Dasar";
        } elseif ($data['results'][0]->lab_id == 2){
            $lab = "Kepala Laboratorium Psikologi Menengah";
        } elseif ($data['results'][0]->lab_id == 3){
            $lab = "Kepala Laboratorium Psikologi Lanjut";
        } else{
            $kepala_lab = "Unknown";
        }
        // Add additional nama lab using mPDF
        $pdf->SetFont($font, '', 12, false,);
        $pdf->SetXY(120, 279); // Adjust X, Y position as needed
        $pdf->SetAutoPageBreak(false);
        $pdf->WriteCell(0, 4, $lab, 0,0, 'C');
        
        // ???
        $pdfFileName = WRITEPATH . 'uploads/' . $name . ".pdf";
        $pdf->Output($pdfFileName, 'F');

        // Optional: You can delete the temporary image file if needed
        unlink($imageFileName);

        // Return the PDF file as a response
        $response = $this->response
            ->setStatusCode(200)
            ->setContentType('application/pdf')
            ->setHeader('Content-Disposition', 'inline; filename="' . $name . ' - SK.pdf"')
            ->setBody(file_get_contents($pdfFileName));

        return $response;
    }
    
    public function sertif($userId)
    {
        if(!session()->get('session')){
            return redirect()->to('');
        }

        $model = new ModelUsers();
        $builder = $model->join('labs', 'labs.lab_id = users.lab_id');
        $builder->select('*'); // Select specific columns, adjust as needed
    
        // Add a WHERE clause to filter by user ID
        $builder->where('users.user_id', $userId);
    
        $data['results'] = $builder->get()->getResult();

        // dd($data['results'][0]);

        // Your PDF content and settings
        $font = FCPATH . "fonts/Inter-Medium.ttf";
        $font2 = FCPATH . "fonts/Overthink.ttf";
        $image = imagecreatefrompng(FCPATH . 'templates/c.png');

        // Create an mPDF object
        $textColour = imagecolorallocate($image, 0, 0, 0); // RGB color
        $cert = $data['results'][0]->cert;
        $name = $data['results'][0]->name;
        $npm = $data['results'][0]->npm;
        $lab_name = $data['results'][0]->lab_name;
        $role =  $data['results'][0]->role;
        $period = $data['results'][0]->period;

        $desc = "Atas partisipasinya sebagai ". $role ."\n\nLaboratorium Psikologi ". $lab_name ."\n\nUniversitas Gunadarma\n\n". $period ;

        // Add additional name using imagettftext
        $textColour = imagecolorallocate($image, 0, 0, 0); // RGB color
        $imageWidth = imagesx($image);
        // $imageHeight = imagesy($image);

        // Ukuran font dan teks yang akan ditampilkan
        $fontSize = 100;
        $angle = 0; // Sudut teks (dalam derajat)
        
        // Mendapatkan koordinat teks agar rata tengah
        $fontBoundingBox = imagettfbbox($fontSize, $angle, $font2, $name);
        $textWidth = $fontBoundingBox[4] - $fontBoundingBox[0];
        // $textHeight = $fontBoundingBox[1] - $fontBoundingBox[5];
        
        $x = ($imageWidth - $textWidth) / 2;
        // $y = ($imageHeight - $textHeight) / 2;
        
        imagettftext($image, $fontSize, $angle, $x, 1020, $textColour, $font2, $name);

        // Save the image to a temporary file
        $imageFileName = WRITEPATH . 'uploads/' . $name . ".jpg";
        imagejpeg($image, $imageFileName);
        imagedestroy($image);

        $pdf = new Mpdf();
        $pdf->AddPage('L');
        $pdf->Image($imageFileName, 0, 0, 297, 210, 'png', '', true, false);
        $pdf->SetMargins(10, 10, 10);

        // Add additional npm using mPDF
        $pdf->SetFont($font, '', 18);
        $pdf->SetXY(145, 101); // Adjust X, Y position as needed
        $pdf->WriteCell(0, 4, $npm, 0,);

        // Add additional desc using mPDF
        $pdf->SetFont($font, '', 18);
        $pdf->SetXY(10, 115); // Adjust X, Y position as needed
        $pdf->MultiCell(0, 4.4, $desc, 0, 'C');

        // Add additional no cert using mPDF
        $pdf->SetFont($font, '', 16);
        $pdf->SetXY(11, 47.5); // Adjust X, Y position as needed
        $pdf->MultiCell(0, 4, $cert, 0, 'C');

        // Add additional date using mPDF
        $time = "Depok, " . date('d F Y');
        $pdf->SetFont($font, '', 14);
        $pdf->SetXY(155, 155); // Adjust X, Y position as needed
        $pdf->WriteCell(0, 4, $time, 0, 0 , 'C');

        if($data['results'][0]->lab_id == 1){
            $kepala_lab = "Dr. Anugriaty Indah Asmarany, M.Si";
        } elseif ($data['results'][0]->lab_id == 2){
            $kepala_lab = "Dr. Hally Weliangan, M.Psi., Psikolog.";
        } elseif ($data['results'][0]->lab_id == 3){
            $kepala_lab = "Dr. Ursa Majorsy, S.Psi., M.Si";
        } else{
            $kepala_lab = "Unknown";
        }
        // Add additional lab head using mPDF
        $pdf->SetFont($font, '', 14, false,);
        $pdf->SetXY(155, 184); // Adjust X, Y position as needed
        $pdf->WriteCell(0, 4, $kepala_lab, 0, 0,'C');

        if($data['results'][0]->lab_id == 1){
            $lab = "Kepala Laboratorium Psikologi Dasar";
        } elseif ($data['results'][0]->lab_id == 2){
            $lab = "Kepala Laboratorium Psikologi Menengah";
        } elseif ($data['results'][0]->lab_id == 3){
            $lab = "Kepala Laboratorium Psikologi Lanjut";
        } else{
            $kepala_lab = "Unknown";
        }
        // Add additional lab name using mPDF
        $pdf->SetFont($font, '', 14, false,);
        $pdf->SetXY(155, 191); // Adjust X, Y position as needed
        $pdf->SetAutoPageBreak(false);
        $pdf->WriteCell(0, 4, $lab, 0, 0, 'C');
        
        // ???
        $pdfFileName = WRITEPATH . 'uploads/' . $name . ".pdf";
        $pdf->Output($pdfFileName, 'F');

        // Optional: You can delete the temporary image file if needed
        unlink($imageFileName);

        // Return the PDF file as a response
        $response = $this->response
            ->setStatusCode(200)
            ->setContentType('application/pdf')
            ->setHeader('Content-Disposition', 'inline; filename="' . $name . ' - Certif.pdf"')
            ->setBody(file_get_contents($pdfFileName));

        return $response;
    }

}
