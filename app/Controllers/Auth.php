<?php

namespace App\Controllers;
use App\Models\ModelUsers; 
use \App\Models\ModelLabs;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Auth extends BaseController
{
    public function tambah()
    {
        if(!session()->get('session')){
            return redirect()->to('');
        }
        $ModelLabs = new ModelLabs();
        $data['result'] = $ModelLabs->findAll();

        return view('auth/tambah', $data);
    }

    public function processUpload(){
        $excelFile = $this->request->getFile('excel_file');

        if ($excelFile->isValid() && $excelFile->getExtension() === 'xlsx') {
            // Baca data dari file Excel
            $spreadsheet = (new Xlsx())->load($excelFile->getPathname());
            $worksheet = $spreadsheet->getActiveSheet();
            $excelData = $worksheet->toArray();

            // Dapatkan model atau table builder yang sesuai
            $model = new ModelUsers(); // Gantilah dengan model atau table builder yang sesuai

            // Loop melalui data Excel dan tambahkan ke database
            // dd($excelData);
            foreach ($excelData as $key => $row) {
                // Skip the first row (header)
                if ($key === 0) {
                    continue;
                }
                
                // Pengecekan nilai null atau kosong
                $isNullRow = true;
                foreach ($row as $cell) {
                    if (!empty($cell)) {
                        $isNullRow = false;
                        break;
                    }
                }

                // Skip baris yang benar-benar kosong
                if ($isNullRow) {
                    continue;
                }

                // transfer data eksel ke db
                $data = [
                    'role' => $row[1],
                    'lab_id' => $row[2], // Sesuaikan dengan indeks kolom Anda
                    'name' => $row[3],
                    'npm' => $row[4],
                    'ttl' => $row[5],
                    'cert' => $row[6],
                    'sk' => $row[7],
                    'praktikum' => $row[8],
                    'period' => $row[9],
                ];

                // cek apakah lab_id nya benar semua jika tidak error
                if($data['lab_id'] == 1 || $data['lab_id'] == 2 || $data['lab_id'] == 3) {
                    $model->insert($data);
                }else{
                    return redirect()->back()->withInput()->with('pesanmasuk', 'Tolong benerin kolom lab id.');
                }

            }

            // Redirect atau berikan umpan balik bahwa pengolahan berhasil
            return redirect()->to('/lab')->with('pesanmasuk', 'Data from Excel uploaded and processed successfully.');
        } else {
            // Tindakan jika file tidak valid atau bukan file Excel
            return redirect()->back()->withInput()->with('pesanmasuk', 'Please upload a valid Excel file.');
        }
    }
    
    public function processTambah()
    {
        if(!session()->get('session')){
            return redirect()->to('');
        }

        $model = new ModelUsers();
        
        $data = [
            'lab_id' => $this->request->getVar('lab_id'),
            'period' =>  $this->request->getVar('period'),
            'cert' =>  $this->request->getVar('cert'),
            'sk' =>  $this->request->getVar('sk'),
            'name' =>  $this->request->getVar('name'),
            'npm' =>  $this->request->getVar('npm'),
            'ttl' =>  $this->request->getVar('ttl'),
            'role' =>  $this->request->getVar('role'),
            'praktikum' =>  $this->request->getVar('praktikum'),
        ];

        $model->insertData($data);

        session()->setFlashdata('pesanmasuk', 'data baru berhasil ditambahkan!');

        return redirect()->to('/lab');
    }

    public function lab($labId = 0)
    {
        if(!session()->get('session')){
            return redirect()->to('');
        }
        
        $model = new ModelUsers();
        // join table
        $builder = $model->join('labs', 'labs.lab_id = users.lab_id');
        $builder ->select('*');

        // cek bila ada parameter dikirim maka tampilin berdasarkan lab masing masing
        if($labId){
            $builder ->where('users.lab_id', $labId);
        }
        
        $data['data'] = $builder->orderBy('name', 'ASC')->get()->getResult();

        return view('auth/lab', $data);
    }

    public function edit($userId)
    {
        if(!session()->get('session')){
            return redirect()->to('');
        }

        $ModelLabs = new ModelLabs();
        $data['result'] = $ModelLabs->findAll();
    
        $model = new ModelUsers();
        $builder = $model->join('labs', 'labs.lab_id = users.lab_id');
        $builder->select('*'); // Select specific columns, adjust as needed
    
        // Add a WHERE clause to filter by user ID
        $builder->where('users.user_id', $userId);
    
        $data['results'] = $builder->get()->getResult();
        
        return view('auth/edit', $data);
    }

    public function processEdit($userId)
    {
        $model = new ModelUsers();
        $data = [
            'lab_id' => $this->request->getVar('lab_id'),
            'period' =>  $this->request->getVar('period'),
            'cert' =>  $this->request->getVar('cert'),
            'sk' =>  $this->request->getVar('sk'),
            'name' =>  $this->request->getVar('name'),
            'npm' =>  $this->request->getVar('npm'),
            'ttl' =>  $this->request->getVar('ttl'),
            'role' =>  $this->request->getVar('role'),
            'praktikum' =>  $this->request->getVar('praktikum'),
        ];
        $model->update($userId, $data);
        
        session()->setFlashdata('pesanmasuk', 'data baru berhasil diedit!');

        return redirect()->to('/lab');
    }

    public function delete($userId)
    {
        $model = new ModelUsers();
        $model->delete($userId);
        return redirect()->back();
    }

    public function deleteAll()
    {
        $model = new ModelUsers();
        $model->truncate();
        return redirect()->back();
    }
}
