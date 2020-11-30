<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DepartemenModel;
use App\Models\UserModel;


class User extends BaseController
{
    protected $userModel;
    protected $deptModel;
    protected $validasi;
    protected $enkripsi;
    protected $config;


    public function __construct()
    {
        $this->config         = new \Config\Encryption();
        // $this->config->key    = 'aBigsecret_ofAtleast32Characters';
        // $this->config->driver = 'OpenSSL';

        $this->userModel = new UserModel();
        $this->deptModel = new DepartemenModel();
        $this->validasi = \Config\Services::validation();
        $this->enkripsi = \Config\Services::encrypter($this->config);
    }

    public function index()
    {
        if (session()->has('logged_in') == true) {
            return redirect()->to('/capa');
        }

        $data = [
            'title' => 'Capaweb Login Page'
        ];

        return view('/user/index', $data);
    }

    public function login()
    {
        // $dekripPass = $this->enkripsi->decrypt(base64_decode('CpEcV0nZouEfaxmoNpPzpmCuFDH/YiwNVop1XyoJd8WNOhxXG+uZKheCVie790bWlXL+U7R1h8ID+ehPal+uNMkOQqH5YFl9mi+NlmM3QS1gUAc=d'), 'jjjj');


        $id = $this->request->getVar('id');
        $password = $this->request->getVar('password');
        $dataUser = $this->userModel->find($id);
        $data = [
            'title' => 'Capaweb Login Page'
        ];


        $user = $this->userModel->getUser($id);
        $dekripsiPassword = $this->enkripsi->decrypt(base64_decode($user['password']));
        $newdata = [
            'id'  => $user['id'],
            'level' => $user['level'],
            'departemen' => $user['departemen'],
            'logged_in' => TRUE
        ];

        if ($dataUser) {
            if ($dekripsiPassword == $password) {
                session()->set($newdata);
                return redirect()->to('/capa');
            } else {
                session()->setFlashdata('error', 'Password salah.');
                return view('/user/index', $data);
            }
        } else {
            session()->setFlashdata('error', 'User Id tidak ditemukan.');
            return view('/user/index', $data);
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/user');
    }

    public function user()
    {
        if (session()->get('level') == 0) {
            return redirect()->to('/user');
        }

        $currentPage = $this->request->getVar('page_user') ? $this->request->getVar('page_user') : 1;
        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $this->userModel->cariUser($keyword);
        } else {
            $this->userModel;
        }

        $data = [
            'title' => 'Data User',
            'user' => $this->userModel->paginate(5, 'user'),
            'pager' => $this->userModel->pager,
            'currentPage' => $currentPage
        ];

        return view('/user/user', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah User',
            'dept' => $this->deptModel->getDept()
        ];

        return view('/user/tambah', $data);
    }

    public function save()
    {
        $password = base64_encode($this->enkripsi->encrypt($this->request->getVar('password')));
        $data = [
            'id' => $this->request->getVar('id'),
            'nama' => $this->request->getVar('nama'),
            'password' => $password,
            'departemen' => $this->request->getVar('departemen'),
            'level' => $this->request->getVar('level'),
        ];

        $this->userModel->insert($data);
        session()->setFlashdata('item', 'User Berhasil Ditambahkan.');

        return redirect()->to('/user/user');
    }

    public function ubah($id)
    {
        $data = [
            'title' => 'Ubah Info User',
            'user' => $this->userModel->getUser($id),
            'dept' => $this->deptModel->getDept(),
            'enkripsi' => $this->enkripsi
        ];

        return view('/user/ubah', $data);
    }

    public function update()
    {
        $password = base64_encode($this->enkripsi->encrypt($this->request->getVar('password')));
        $data = [
            'id' => $this->request->getVar('id'),
            'nama' => $this->request->getVar('nama'),
            'password' => $password,
            'departemen' => $this->request->getVar('departemen'),
            'level' => $this->request->getVar('level'),
        ];

        $this->userModel->save($data);
        session()->setFlashdata('item', 'Data User Berhasil Diubah.');

        return redirect()->to('/user/user');
    }

    public function delete()
    {
        $id = $this->request->getVar('id');
        $this->userModel->delete($id);
        session()->setFlashdata('item', 'Data User Berhasil Dihapus.');
        return redirect()->to('/user/user');
    }

    public function ubahpassword($id = false)
    {
        if (!$id) {
            $id = $this->request->getVar('id');
        }
        $data = [
            'title' => 'Ubah Password',
            'validasi' => $this->validasi,
            'user' => $this->userModel->getUser($id)
        ];

        return view('/user/ubahpassword', $data);
    }



    public function updatepassword()
    {
        $id = $this->request->getVar('id');
        $user = $this->userModel->getUser($id);
        $password_lama = $this->enkripsi->decrypt(base64_decode($user['password']));
        $passwordLama = $this->request->getVar('passwordlama');
        $passwordBaru = base64_encode($this->enkripsi->encrypt($this->request->getVar('passwordbaru')));;

        $user = $this->userModel->getUser($id);

        // if (!$this->validate([
        //     'password' => [
        //         'rules' => 'required|matches[user.password]',
        //         'errors' => [
        //             'required' => 'Inputkan password lama',
        //             'matches' => 'Password lama tidak sama'
        //         ]
        //     ]
        // ])) {
        //     return redirect()->to('/user/ubahpassword/' . $id)->withInput();
        // }

        if ($passwordLama !== $password_lama) {
            session()->setFlashdata('item', 'Password lama tidak sama');
            return redirect()->to('/user/ubahpassword/' . $id)->withInput();
        } elseif ($passwordBaru == '') {
            session()->setFlashdata('item', 'Masukan password baru');
            return redirect()->to('/user/ubahpassword/' . $id)->withInput();
        }

        $data = [
            'id' => $id,
            'password' => $passwordBaru
        ];

        $this->userModel->save($data);

        session()->destroy();
        return redirect()->to('/user');
    }

    //--------------------------------------------------------------------

}
