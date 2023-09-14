<?php

namespace App\Controllers;

use App\Models\OrangModel;
// use App\Models\OrangModel

class Orang extends BaseController
{
    protected $orangModel;
    public function __construct()
    {
        // cara konek ke database tanpa model contoh
        // $db = \Config\Database::connect();
        // $komik = $db->query("SELECT * FROM komik");
        // // dd($komik);
        // foreach ($komik->getResultArray() as $row){
        //     d($row);
        // }

        // cara konek ke database melalui model
        /**
         *
         * $KomikModel = new \App\Models\KomikModel();
         *
         */
        // kita arahkan dulu namespace nya untuk keluar dari folder Controllers

        /**   Atau ada cara yang lebih simpel yaitu kamu tinggal tulisin diatas setelah tag namespace
         *
         * use App\Models\KomikModel;
         *
         * lalu di bawahnya tinggal panggil aja
         *
         * $KomikModel = new KomikModel();
         */

        $this->orangModel = new OrangModel();
        $this->request = \Config\Services::request();
    }
    public function index()
    {   //$count = $this->orangModel->getOrang();

        $jumlahSeluruh = new OrangModel();
        $count = $jumlahSeluruh->getDataOrang();
        // $count = $this->orangModel->findAll();
        $currentPage = $this->request->getVar('page_orang') ? $this->request->getVar('page_orang') : 1;
        // $jumlah = $this->request->getVar('');
        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $orang = $this->orangModel->search($keyword);
        }else{
            $orang = $this->orangModel;
        }
        
        // note ternyata setealah saya coba merubah 

        
        $data = [
            'title' => 'Wpu | Daftar Orang',
            // 'orang' => $this->orangModel->findAll(),
            // 'orang' => $this->orangModel->paginate(10, 'orang'),
            'orang' => $this->orangModel->getOrang(),
            'orangPaginate' => $orang->paginate(10, 'orang'),
            'hasil' => $count,
            'pager' => $this->orangModel->pager,
            'currentPage' => $currentPage,
            'keyword' => $keyword
            
        ];
        
        return view('orang/index', $data);
    }
    
    public function jumlahSeluruh(){
        // $jumlahSeluruh = new OrangModel();
        // $count = $jumlahSeluruh->getOrang();
        // $data = [
        //     'hasil' => $count
        // ];
        // return view("orang/index",$data);
        
        // dd($count);

        // $orangModel = new OrangModel;
        // return view("orang/index",[
        //     'count' => $orangModel->countAllResults()
        // ]);

        // return $count;
    }
    
}
