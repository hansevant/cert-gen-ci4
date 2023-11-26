<?php

namespace App\Controllers;

class House extends BaseController
{
    public function index()
    {
        if(!session()->get('session')){
            return redirect()->to('');
        }

        return view('auth/index');
    }

}
