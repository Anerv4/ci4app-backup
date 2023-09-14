<?php

namespace App\Controllers;

use App\Models\KomikModel;
use App\Models\PopulerModel;

class Pages extends BaseController
{
    protected $populerModel;
    protected $komikModel;
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

        $this->populerModel = new PopulerModel();
        $this->komikModel = new KomikModel();
        $this->request = \Config\Services::request();
        
    }
    public function index()
    {
        // $faker = \Faker\Factory::create();
        // dd($faker->name);
        // nyoba doang
        $jumlahSeluruh = new KomikModel();
        $count = $jumlahSeluruh->getDataKomik();
        $currentPage = $this->request->getVar('page_komik') ? $this->request->getVar('page_komik') : 1;
        // $jumlah = $this->request->getVar('');
        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $komikPaginate = $this->komikModel->search($keyword);
        }else{
            $komikPaginate = $this->komikModel;
        }

        $data = [
            'title' => 'Wpu | Home',
            'komikpopuler' => $this->populerModel->getKomik(),
            'komik' => $this->komikModel->getKomik(),
            'komikPaginate' => $komikPaginate->paginate(12,'komik'),
            'pager' => $this->komikModel->pager,
            'currentPage' => $currentPage,
            'keyword' => $keyword,
            'hasil' => $count 

        ];
        
        // sebelum di modifikasi
        // echo view('layout/header' ,$data);
        // echo view('pages/home');
        // echo view('layout/footer');
        // dikarenakan dalam satu function hanya boleh ada satu return maka kita bisa menggnakan echo

        // sesudah di modifikasi
        return view('pages/homeNew',$data);
    }
    public function populer(){
         // $faker = \Faker\Factory::create();
        // dd($faker->name);
        // nyoba doang
        $jumlahSeluruh = new PopulerModel();
        $count = $jumlahSeluruh->getDataKomikPopuler();
        $currentPage = $this->request->getVar('page_populer') ? $this->request->getVar('page_populer') : 1;
        // $jumlah = $this->request->getVar('');
        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $komikPaginate = $this->populerModel->search($keyword);
        }else{
            $komikPaginate = $this->populerModel;
        }

        $data = [
            'title' => 'Wpu | Daftar Komik Populer',
            'komikpopuler' => $this->populerModel->getKomik(),
            // 'komik' => $this->komikModel->getKomik(),
            'komikPaginate' => $komikPaginate->paginate(10,'populer'),
            'pager' => $this->populerModel->pager,
            'currentPage' => $currentPage,
            'keyword' => $keyword,
            'hasil' => $count 

        ];
        // $data = [
        //     'title' => 'Wpu | Daftar Komik Populer',
        //     'komikpopuler' => $this->populerModel->getKomik()
        // ];
        return view('pages/komikpopuler', $data);
    }
    public function save()
    {
        if (!$this->validate([
            // 'judul' => 'required|is_unique[komik.judul]' 
            //is_unique[NamaTabel.Field/Kolom] dalam db
            // pakai cara diatas sudah bisa namun kalau kalian pingin mengatur pesannya maka bisa pakai cara ini

            // key nya diambil dari name form nya
            // |
            // V
            'judul'=> [
                'rules' => 'required|is_unique[populer.judul]', //lalu kalu ada error
                'errors' => [
                    'required' => 'Judul Komik Tidak Boleh Kosong',
                    'is_unique' => 'Judul Komik Sudah Terdaftar'
                ]//kita akan kasih error untuk tiap tiap rules nya makanya kita harus kasih array disini
                ],
            'penulis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Penulis Komik Tidak Boleh Kosong'
                ]
                ],
            'penerbit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Penerbit Komik Tidak Boleh Kosong'
                ]
                ],
            'sampul' => [
                'rules' => 'max_size[sampul,100024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]', 

                // yang dibawah ada rules harus uploadnya sedangkan yang di atas tidak ada
                // 'rules' => 'uploaded[sampul]|max_size[sampul,6024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]', 
                //max-size[namaInput,UkurannyaBerapa]
                // mime_in[namaInput,Tipe Mime Apa Yang Mau Dibatasi]

                'errors'=> [
                    // 'uploaded' => 'Pilih Gambar Sampul Terlebih Dahulu',
                    'max_size' => 'Ukuran Gambar Terlalu Besar',
                    'is_image' => 'Yang Anda Pilih Bukan Gambar',
                    'mime_in' => 'Yang Anda Pilih Bukan Gambar/Format Tidak Terdaftar'

                ]
                ],
                'sinopsis' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Sinopsis Komik Tidak Boleh Kosong'
                    ]
                    ],

        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
            return redirect()->to('/pages/create')->withInput();
            //pertama ,kita mengirimkan semua input yang sudah kita inputkan. kedua,kita mengirimkan validation nya ke method create

            // bisa juga dengan cara berikut
            // $data['validation'] = $validation;
            // return view('/komik/create', $data);
        }
    //    dd($this->request->getVar());
    // kalau sudah berhasil ditangkap berarti kita tinggal insert aja kedalam database
    
    //ambil gambar/kelola gambar nya->pindahkan gambar->baru insert kedalam database
    $fileSampul = $this->request->getFile('sampul');
    // cek apakah tidak ada gambar yang diupload
    if ($fileSampul->getError() == 4) {
        $namaSampul = 'default.png';
    }else{
        // kalau mau ingin lebih aman caranya seperti ini
        // generate nama sampul random
        $namaSampul = $fileSampul->getName();
        // pindahkan file ke folder img
        $fileSampul->move('imgPopuler', $namaSampul);
        // sebenarnya cara dibawah ini saja sudah bisa namun nanti namanya akan terdapat nomernya jika nama gambar yang di upload sama 
        // ambil nama file sampul
        // $namaSampul = $fileSampul->getName();
    }

    
    // // kalau mau ingin lebih aman caranya seperti ini
    // // generate nama sampul random
    // $namaSampul = $fileSampul->getRandomName();
    // // pindahkan file ke folder img
    // $fileSampul->move('img', $namaSampul);
    // // sebenarnya cara dibawah ini saja sudah bisa namun nanti namanya akan terdapat nomernya jika nama gambar yang di upload sama 
    // // ambil nama file sampul
    // // $namaSampul = $fileSampul->getName();



    //jika menggunakan model
    $slug = url_title($this->request->getVar('judul'), '-', true);
    //untuk membuat String jadi ramah url ci4 punya method "url_title()" untuk membuat string menjadi huruf kecil semua dan menghilangkan spasi dan bisa kalian ganti spasi nya menjadi apa yang kalian mau , default nya minus(-)
        $this->populerModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            // 'sampul' => $this->request->getVar('sampul')
            'sinopsis' => $this->request->getVar('sinopsis'),
            'sampul' => $namaSampul
            // ini akan membuat file yang diupload namanya akan sama dengan file yang diinsert

        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        // untuk mengirimkan session pemberitahuan berhasil jika data sudah berhasil ditambahkan

        //ada dua parameter yaitu setFlashdata('nama nya apa', 'Pesannya gimana/apa')

        return redirect()->to('/pages/populer');
    }
    public function create()
    {
        
        $data = [
            'title' => 'Wpu | Form Tambah Data Komik',
            'validation' => \Config\Services::validation()
            //lalu tinggal akses variable validation dihalaman create
            
        ];
        return view('pages/create',$data);
    }
    public function detail($slug)
    {
        /** disini method where() adalah metode code igniter yang sama dengan bahasa mysql yaitu
         * "SELECT * FROM komik WHERE slug;"
         */
 
        // dd($komik);
        $data = [
            'title' => 'Wpu | DetailKomik',
            'komikpopuler' => $this->populerModel->getKomik($slug)
        ];

        // jika komik tidak ada di tabel
        if (empty($data['komikpopuler'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul komik "' .$slug . '" Tidak Tersedia/Ditemukan');
            //codeigniter punya method untuk nampilin exceptions yaitu (throw)
        }


        return view('pages/detail', $data);
    }
    public function delete($id)
    {
        // cari dulu gambar berdasarkan id
        $komik = $this->populerModel->find($id);
        // disini kan method find mengambil semua data yang ada di dalam tabel komik di databasenya , dan yang kita butuhkan cuma file gambar nya/sampulnya
        // ^ namun methode ini juga akan bisa menghapus gambar default yang sudah kita sediakan untuk pengguna yang tidak mengupload gambar sampul nya,dan ini akan jadi bahaya


        // cek jika gambarnya default.png
        if ($komik['sampul'] != 'default.png') {
            //hapus gambar
            unlink('imgPopuler/' . $komik['sampul']);
            //unlink('carifileGambarnya' . namafilenyaApa) kita belum tau namafilenya apa yang kita tau id nya saja

        }
            $this->populerModel->delete($id);
            session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
            return redirect()->to('/pages/populer');
        





        // method delete ini sudah bawaannya dari code igniter
        // $this->komikModel->delete($id);
        // return redirect()->to('/komik');
        // namun ada problemnya ,cara menghapus kita menggunakan method ini adalah cara menghapus konvesional,yang artinya bisa ditulis manual di url browsernya nah itu akan membahayakan data yang ada pada databse kita ,karena bisa jadi ada orang yang mengarang semua id nya dan itu akan otomatis menghapus data kita, jadi method ini kurang tepat.

        // maka dari itu kita akan memakai sebuah tekhnik yang namanya (HTTP Method Puffing) supaya lebih aman, jadi kita akalin supaya data kita hanya bisa di delete ketika request methodnya dikirimin adalah delete
    }
    public function edit($slug)
    {
        $data = [
            'title' => 'Wpu | Form Ubah Data Komik Populer',
            'validation' => \Config\Services::validation(),
            'komikpopuler' => $this->populerModel->getKomik($slug)
            //lalu tinggal akses variable validation dihalaman create
            
        ];
        return view('pages/edit',$data);
    }
    public function update($id)
    {

        //cek judul
        $komikLama = $this->populerModel->getKomik($this->request->getVar('slug'));
        if ($komikLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        }else{
            $rule_judul = 'required|is_unique[populer.judul]';
        }

        if (!$this->validate([
            // 'judul' => 'required|is_unique[komik.judul]' //is_unique[NamaTabel.Field/Kolom] dalam db
            // pakai cara diatas sudah bisa namun kalau kalian pingin mengatur pesannya maka bisa pakai cara ini
            'judul'=> [
                'rules' => $rule_judul,
                // 'required|is_unique[komik.judul]' //lalu kalu ada error
                'errors' => [
                    'required' => 'Judul Komik Tidak Boleh Kosong',
                    'is_unique' => 'Judul Komik Sudah Terdaftar'
                ]//kita akan kasih error untuk tiap tiap rules nya makanya kita harus kasih array disini
                ],
            'penulis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Penulis Komik Tidak Boleh Kosong'
                ]
                ],
            'penerbit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Penerbit Komik Tidak Boleh Kosong'
                ]
                ],
                'sampul' => [
                'rules' => 'max_size[sampul,100024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]', 

                // yang dibawah ada rules harus uploadnya sedangkan yang di atas tidak ada
                // 'rules' => 'uploaded[sampul]|max_size[sampul,6024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]', 
                //max-size[namaInput,UkurannyaBerapa]
                // mime_in[namaInput,Tipe Mime Apa Yang Mau Dibatasi]

                'errors'=> [
                    // 'uploaded' => 'Pilih Gambar Sampul Terlebih Dahulu',
                    'max_size' => 'Ukuran Gambar Terlalu Besar',
                    'is_image' => 'Yang Anda Pilih Bukan Gambar',
                    'mime_in' => 'Yang Anda Pilih Bukan Gambar/Format Tidak Terdaftar'

                ]
                ],
                'sinopsis' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Sinopsis Komik Tidak Boleh Kosong'
                    ]
                    ],

        ])) {
            return redirect()->to('/pages/edit/' . $this->request->getVar('slug'))->withInput();//pertama ,kita mengirimkan semua input yang sudah kita inputkan. kedua,kita mengirimkan validation nya ke method create

            // bisa juga dengan cara berikut
            // $data['validation'] = $validation;
            // return view('/komik/create', $data);
        }
        $fileSampul = $this->request->getFile('sampul');

        // cek gambar apakah tetap gambar lama 
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        }else{
            //generate nama file random 
            $namaSampul = $fileSampul->getName();
            // pindahkan gambar 
            $fileSampul->move('imgPopuler', $namaSampul);
            if ($this->request->getVar('sampulLama') != 'default.png') {
                unlink('imgPopuler/' . $this->request->getVar('sampulLama'));
            }
            // diatas kan file nya baru tuh
            // kalau baru hapus file yang lama supaya tidak menuh menuhin
            // unlink('img/' . $this->request->getVar('sampulLama'));
        }


        $slug = url_title($this->request->getVar('judul'), '-', true);
    //utnuk membuat String jadi ramah url ci4 punya method "url_title()" untuk membuat string menjadi huruf kecil semua dan menghilangkan spasi dan bisa kalian ganti spasi nya menjadi apa yang kalian mau , default nya minus(-)
        $this->populerModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul

        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        // untuk mengirimkan session pemberitahuan berhasil jika data sudah berhasil ditambahkan

        //ada dua parameter yaitu setFlashdata('nama nya apa', 'Pesannya gimana/apa')

        return redirect()->to('/pages/populer');
    }
    


    public function about()
    {
        // return view berasal dari folder View
        // return view('pages/about');
        $jumlahSeluruh = new KomikModel();
        $count = $jumlahSeluruh->getDataKomik();
        $currentPage = $this->request->getVar('page_komik') ? $this->request->getVar('page_komik') : 1;
        // $jumlah = $this->request->getVar('');
        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $komikPaginate = $this->komikModel->search($keyword);
        }else{
            $komikPaginate = $this->komikModel;
        }
        $data = [
            'title' => 'Wpu | About me',
            'komikpopuler' => $this->populerModel->getKomik(),
            'komik' => $this->komikModel->getKomik(),
            'komikPaginate' => $komikPaginate->paginate(10,'komik'),
            'pager' => $this->komikModel->pager,
            'currentPage' => $currentPage,
            'keyword' => $keyword,
            'hasil' => $count 
        ];
        // sebelum dimodifikasi
        // echo view('layout/header' ,$data);
        // echo view('pages/about');
        // echo view('layout/footer');

        // sesudah dimodifikasi
        return view('pages/about',$data);
    }
    public function contact(){
        $data = [
            'title' => 'Wpu | Contact',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jl.in aja dulu',
                    'kota' => 'Surabaya'
                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'Jl.menuju surga',
                    'kota' => 'Masih di Bumi kok'
                ]
            ]
        ];

        return view('pages/contact',$data);
    }

}
