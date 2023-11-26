<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        // seperti captcha
        $array = [
            '1+1',
            '3-2',
            '0-3',
            '5*4',
            '8/2',
        ];
        
        // untuk mengambil array acak dan indeksnya
        $randomIndex = array_rand($array);
        $randomQuestion['question'] = $array[$randomIndex];

        // cek apakah ada logout
        $logout = $this->request->getGet('logout');
        if($logout){
            session()->destroy();
        }

        // cek apakah sudah ada sesi blm
        if(session()->get('session')){
            return redirect()->to('/lab');
        }

        return view('login', $randomQuestion);
    }
    public function processLogin()
    {
        $question = $this->request->getPost('question');
        $answer = $this->request->getPost('answer');
        $result= eval('return ' . $question . ';');

        // Your authentication logic here
        if($answer == ''){
            session()->setFlashdata('error', 'Tolong dijawab!');
            return redirect()->to('');
        }
        if ($result != $answer) {
            session()->setFlashdata('error', 'Salah :p');
            return redirect()->to('');
        } 

        // bila berhasil melewati tahap diatas lalu bikin sesi
        session()->set('session', 'Maniezz');
        session()->setFlashdata('success', 'Benarr!!');
        return redirect()->to('/lab');
    }
}
