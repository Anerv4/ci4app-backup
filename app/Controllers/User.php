<?php 

namespace App\Controllers;

use App\Models\KomikModel;

class User extends BaseController
{
    protected $komikModel;
    public function __construct()
    {
        $this->komikModel = new KomikModel();
        $this->request = \Config\Services::request();
    }
    public function detail($slug)
    {
        $data = [
            'title' => 'Wpu | DetailKomik User',
            'komikDetail' => $this->komikModel->getKomik($slug)
        ];
        if (empty($data['komikDetail'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul Komik "'.$slug .'" Tidak Tersedia/Ditemukan');
        }

        return view('user/detailuser',$data);
    }
}

?>