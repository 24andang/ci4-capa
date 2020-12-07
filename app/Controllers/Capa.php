<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\CapaModel;
use App\Models\UserModel;

class Capa extends BaseController
{
    protected $capaModel;
    protected $userModel;

    public function __construct()
    {
        $this->capaModel = new CapaModel();
        $this->userModel = new UserModel();
    }


    public function index($export = 0, $sumber = 'bpom')
    {
        if (session()->has('logged_in') == false) {
            return redirect()->to('/user');
        }
        // dd(session()->get('departemen'));
        $currentPage = $this->request->getVar('page_capa') ? $this->request->getVar('page_capa') : 1;
        $keyword = $this->request->getVar("keyword");

        $userLoggedIn = $this->userModel->getUser(session()->get('id'));
        // $sumber = $this->request->getVar('sumber');

        if ($keyword) {
            $capa = $this->capaModel->search($keyword, $sumber);
        } elseif ($sumber) {
            $capa = $this->capaModel->searchBySumber($sumber);
        } elseif (session()->get('level') == 2) {
            $capa = $this->capaModel;
        } else {
            $capa = $this->capaModel->getCapaByDept($userLoggedIn['departemen'])->searchBySumber('bpom');
        }

        if ($export == 1) {
            // Kode export 1 untuk excel
            $data = [
                'title' => 'Capaweb',
                'capa' => $capa->getCapa()
            ];

            return view('/capa/excel', $data);
        }

        $data = [
            'title' => 'Capaweb',
            'capa' => $capa->paginate(5, 'capa'),
            'pager' => $capa->pager,
            'currentPage' => $currentPage,
            'sumber' => $sumber
        ];

        return view('capa/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail',
            'capa' => $this->capaModel->getCapa($id)
        ];

        return view('/capa/detail', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Capa',
            'user' => $this->userModel->getUser(),
            'userLogIn' => $this->userModel->getUser(session()->get('id'))
        ];
        return view('/capa/tambah', $data);
    }

    public function save()
    {
        $namaFotoCa = null;
        if ($this->request->getFile('ca_bukti')->getError() != 4) {
            $fotoCa = $this->request->getFile('ca_bukti');
            $namaFotoCa = $fotoCa->getRandomName();
            $fotoCa->move('img', $namaFotoCa);
        }

        $namaFotoPa = null;
        if ($this->request->getFile('pa_bukti')->getError() != 4) {
            $fotoPa = $this->request->getFile('pa_bukti');
            $namaFotoPa = $fotoPa->getRandomName();
            $fotoPa->move('img', $namaFotoPa);
        }

        $data = [
            'temuan' => $this->request->getVar('temuan'),
            'sumber' => $this->request->getVar('sumber'),
            'kt' => $this->request->getVar('kt'),
            'persyaratan' => $this->request->getVar('persyaratan'),
            'kondisi' => $this->request->getVar('kondisi'),
            'gap' => $this->request->getVar('gap'),
            'rootcause' => $this->request->getVar('rootcause'),
            'ca' => $this->request->getVar('ca'),
            'ca_deadtime' => $this->request->getVar('ca_deadtime'),
            'ca_pic' => $this->request->getVar('ca_pic'),
            'ca_departemen' => $this->request->getVar('ca_departemen'),
            'ca_bukti' => $namaFotoCa,
            'ca_status' => $this->request->getVar('ca_status'),
            'pa' => $this->request->getVar('pa'),
            'pa_deadtime' => $this->request->getVar('pa_deadtime'),
            'pa_pic' => $this->request->getVar('pa_pic'),
            'pa_bukti' => $namaFotoPa,
            'pa_status' => $this->request->getVar('pa_status'),
            'hasil' => $this->request->getVar('hasil')
        ];

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');

        $this->capaModel->save($data);
        return redirect()->to('/capa');
    }


    public function delete()
    {
        $id = $this->request->getVar('idHidden');
        $capa = $this->capaModel->find($id);

        if ($caGbr = $capa['ca_bukti']) {
            unlink('img/' . $caGbr);
        }
        if ($caGbr = $paGbr = $capa['pa_bukti']) {
            unlink('img/' . $paGbr);
        }

        $this->capaModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/capa');
    }

    public function update($id)
    {
        $data = [
            'title' => 'Form Ubah Data Capa',
            'capa' => $this->capaModel->find($id)
        ];
        return view('/capa/ubah', $data);
    }

    public function updateCapa()
    {
        $id = $this->request->getVar('id');
        $capa = $this->capaModel->find($id);

        $namaFotoCa = $capa['ca_bukti'];
        if ($this->request->getFile('ca_bukti')->getError() != 4) {
            $fotoCa = $this->request->getFile('ca_bukti');
            $namaFotoCa = $fotoCa->getRandomName();
            $fotoCa->move('img', $namaFotoCa);
        }

        $namaFotoPa = $capa['pa_bukti'];
        if ($this->request->getFile('pa_bukti')->getError() != 4) {
            $fotoPa = $this->request->getFile('pa_bukti');
            $namaFotoPa = $fotoPa->getRandomName();
            $fotoPa->move('img', $namaFotoPa);
        }

        $data = [
            'id' => $id,
            'temuan' => $this->request->getVar('temuan'),
            'kt' => $this->request->getVar('kt'),
            'persyaratan' => $this->request->getVar('persyaratan'),
            'kondisi' => $this->request->getVar('kondisi'),
            'gap' => $this->request->getVar('gap'),
            'rootcause' => $this->request->getVar('rootcause'),
            'ca' => $this->request->getVar('ca'),
            'ca_deadtime' => $this->request->getVar('ca_deadtime'),
            'ca_pic' => $this->request->getVar('ca_pic'),
            'ca_bukti' => $namaFotoCa,
            'ca_status' => $this->request->getVar('ca_status'),
            'pa' => $this->request->getVar('pa'),
            'pa_deadtime' => $this->request->getVar('pa_deadtime'),
            'pa_pic' => $this->request->getVar('pa_pic'),
            'pa_bukti' => $namaFotoPa,
            'pa_status' => $this->request->getVar('pa_status'),
            'hasil' => $this->request->getVar('hasil')
        ];
        $this->capaModel->save($data);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('/capa');
    }

    public function about()
    {
        $data = [
            'title' => 'About'
        ];
        return view('/capa/about', $data);
    }
}
