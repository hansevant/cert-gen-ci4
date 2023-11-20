<?php

namespace App\Controllers;

class House extends BaseController
{
    public function index()
    {
        if(!session()->get('session')){
            return redirect()->to('');
        }
        $ModelLabs = new \App\Models\ModelLabs();
        $data['result'] = $ModelLabs->findAll();

        return view('auth/index', $data);
    }

}
