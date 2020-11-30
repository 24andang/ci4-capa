<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dokumen extends BaseController
{
    public function index()
    {
        if (session()->has('logged_in') == false) {
            return redirect()->to('/user');
        }

        $data = [
            'title' => 'Dokumen'
        ];

        return view('dokumen/index', $data);
    }
}
