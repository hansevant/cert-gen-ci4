<?php

namespace App\Controllers;
use App\Models\ModelUsers; 
use \App\Models\ModelLabs;

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

        session()->setFlashdata('pesantambah', 'data baru berhasil ditambahkan!');

        return redirect()->to('/a');
    }

    public function lab()
    {
        if(!session()->get('session')){
            return redirect()->to('');
        }
        $ModelLabs = new ModelLabs();
        $data['result'] = $ModelLabs->findAll();
        
        $model = new ModelUsers();
        $builder = $model->join('labs', 'labs.lab_id = users.lab_id');
        $builder ->select('*');

        $data['data'] = $builder->get()->getResult();

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
        
        // dd($data);

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
        
        session()->setFlashdata('pesantambah', 'data baru berhasil diedit!');

        return redirect()->to('/a');
    }
}
