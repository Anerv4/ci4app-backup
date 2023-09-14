<?php

namespace App\Controllers;

use App\Models\KomikModel;
use App\Models\GenreModel;


class Komik extends BaseController
{
    protected $komikModel;
    protected $genreModel;
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

        $this->komikModel = new KomikModel();
        $this->genreModel = new GenreModel();
        $this->request = \Config\Services::request();
        
    }
    public function index()
    {
        // $genre = $this->request->getVar('genre[]');
        $jumlahSeluruh = new KomikModel();
        $count = $jumlahSeluruh->getDataKomik();
        // $komik = $this->komikModel->findAll();
        $currentPage = $this->request->getVar('page_komik') ? $this->request->getVar('page_komik') : 1;
        // $jumlah = $this->request->getVar('');
        $keyword = $this->request->getVar('keyword');
        // d($keyword);
        if($keyword){
            $komikPaginate = $this->komikModel->search($keyword);
        }else{
            $komikPaginate = $this->komikModel;
        }

        $data = [
            'title' => 'Wpu | Daftar Komik',
            'komik' => $this->komikModel->getKomik(),
            'komikPaginate' => $komikPaginate->paginate(10,'komik'),
            'pager' => $this->komikModel->pager,
            'currentPage' => $currentPage,
            'keyword' => $keyword,
            // 'genre' => implode("," , $genre),
            'hasil' => $count
        ];
            
            
            return view('komik/index', $data);
    }
    public function bacakomik()
    {
        $data = [
            'title' => 'Wpu | Baca Komik'
            
        ];
        return view('komik/bacakomik', $data);
    }
    public function bacanovel()
    {
        $data = [
            'title' => 'Wpu | Baca Novel'
            
        ];
        return view('komik/bacanovel', $data);
    }
    public function create()
    {
        $genre = $this->genreModel->getGenre();
        // d($genre);
        $data = [
            'title' => 'Wpu | Form Tambah Data Komik',
            'genre' => $genre,
            'validation' => \Config\Services::validation()
            //lalu tinggal akses variable validation dihalaman create
            
        ];
        return view('komik/create',$data);
    }
    public function detail($slug)
    { 
        // $genre = $this->request->getVar('genre[]');
        $jumlahSeluruh = new KomikModel();
        $count = $jumlahSeluruh->getDataKomik();
        // $komik = $this->komikModel->findAll();
        $currentPage = $this->request->getVar('page_komik') ? $this->request->getVar('page_komik') : 1;
        // $jumlah = $this->request->getVar('');
        $keyword = $this->request->getVar('keyword');
        // d($keyword);
        if($keyword){
            $komikPaginate = $this->komikModel->search($keyword);
        }else{
            $komikPaginate = $this->komikModel;
        }
        /** disini method where() adalah metode code igniter yang sama dengan bahasa mysql yaitu
         * "SELECT * FROM komik WHERE slug;"
         */
 
        // dd($komik);
        $data = [
            'title' => 'Wpu | DetailKomik',
            'komik' => $this->komikModel->getKomik($slug),
            'komikPaginate' => $komikPaginate->paginate(10,'komik'),
            'pager' => $this->komikModel->pager,
            'currentPage' => $currentPage,
            'keyword' => $keyword,
            // 'genre' => implode("," , $genre),
            'hasil' => $count
        ];

        // jika komik tidak ada di tabel
        if (empty($data['komik'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul komik "' .$slug . '" Tidak Tersedia/Ditemukan');
            //codeigniter punya method untuk nampilin exceptions yaitu (throw)
        }


        return view('komik/detail', $data);
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
                'rules' => 'required|is_unique[komik.judul]', //lalu kalu ada error
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
                'rules' => 'max_size[sampul,6024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]', 

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
                'genre' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Genre Komik Tidak Boleh Kosong'
                ]
                ],

        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
            return redirect()->to('/komik/create')->withInput();
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
        $fileSampul->move('img', $namaSampul);
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
    $genre = $this->request->getVar('genre[]');

    // $genre = url_title($this->request->getVar('genre'), ',',true);
    //untuk membuat String jadi ramah url ci4 punya method "url_title()" untuk membuat string menjadi huruf kecil semua dan menghilangkan spasi dan bisa kalian ganti spasi nya menjadi apa yang kalian mau , default nya minus(-)
        $this->komikModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            // 'sampul' => $this->request->getVar('sampul')
            'sinopsis' => $this->request->getVar('sinopsis'),
            'genre' => implode("," , $genre),
            'sampul' => $namaSampul
            // ini akan membuat file yang diupload namanya akan sama dengan file yang diinsert

        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        // untuk mengirimkan session pemberitahuan berhasil jika data sudah berhasil ditambahkan

        //ada dua parameter yaitu setFlashdata('nama nya apa', 'Pesannya gimana/apa')

        return redirect()->to('/komik');
    }
    public function delete($idKomik)
    {
        // cari dulu gambar berdasarkan id
        $komik = $this->komikModel->find($idKomik);
        // disini kan method find mengambil semua data yang ada di dalam tabel komik di databasenya , dan yang kita butuhkan cuma file gambar nya/sampulnya
        // ^ namun methode ini juga akan bisa menghapus gambar default yang sudah kita sediakan untuk pengguna yang tidak mengupload gambar sampul nya,dan ini akan jadi bahaya


        // cek jika gambarnya default.png
        if ($komik['sampul'] != 'default.png') {
            //hapus gambar
            unlink('img/' . $komik['sampul']);
            //unlink('carifileGambarnya' . namafilenyaApa) kita belum tau namafilenya apa yang kita tau id nya saja

        }
            $this->komikModel->delete($idKomik);
            session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
            return redirect()->to('/komik');
        





        // method delete ini sudah bawaannya dari code igniter
        // $this->komikModel->delete($id);
        // return redirect()->to('/komik');
        // namun ada problemnya ,cara menghapus kita menggunakan method ini adalah cara menghapus konvesional,yang artinya bisa ditulis manual di url browsernya nah itu akan membahayakan data yang ada pada databse kita ,karena bisa jadi ada orang yang mengarang semua id nya dan itu akan otomatis menghapus data kita, jadi method ini kurang tepat.

        // maka dari itu kita akan memakai sebuah tekhnik yang namanya (HTTP Method Puffing) supaya lebih aman, jadi kita akalin supaya data kita hanya bisa di delete ketika request methodnya dikirimin adalah delete
    }
    public function edit($slug)
    {
        $genre = $this->genreModel->getGenre();
        // $genre = $this->genreModel->getGenre($this->request->getVar('genre[]'));
        // $genre2 = $this->request->getVar('genre[]');
        // $genreGenre= implode(',',$genre2);

        $data = [
            'title' => 'Wpu | Form Ubah Data Komik',
            'validation' => \Config\Services::validation(),
            'komik' => $this->komikModel->getKomik($slug),
            'genre' => $genre,
            
            //lalu tinggal akses variable validation dihalaman create
            
        ];
        return view('komik/edit',$data);
    }
    public function update($idKomik)
    {
        
        // $genre = $this->genreModel->getGenre();
        //cek judul
        $komikLama = $this->komikModel->getKomik($this->request->getVar('slug'));
        if ($komikLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        }else{
            $rule_judul = 'required|is_unique[komik.judul]';
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
                'rules' => 'max_size[sampul,6024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]', 

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
                'genre' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Genre Komik Tidak Boleh Kosong'
                ]
                ],

        ])) {
            return redirect()->to('/komik/edit/' . $this->request->getVar('slug'))->withInput();//pertama ,kita mengirimkan semua input yang sudah kita inputkan. kedua,kita mengirimkan validation nya ke method create

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
            $fileSampul->move('img', $namaSampul);
            if ($this->request->getVar('sampulLama') != 'default.png') {
                unlink('img/' . $this->request->getVar('sampulLama'));
            }
            // diatas kan file nya baru tuh
            // kalau baru hapus file yang lama supaya tidak menuh menuhin
            // unlink('img/' . $this->request->getVar('sampulLama'));
        }


        $slug = url_title($this->request->getVar('judul'), '-', true);
        $genre = $this->request->getVar('genre[]');
    //utnuk membuat String jadi ramah url ci4 punya method "url_title()" untuk membuat string menjadi huruf kecil semua dan menghilangkan spasi dan bisa kalian ganti spasi nya menjadi apa yang kalian mau , default nya minus(-)
        $this->komikModel->save([
            'idKomik' => $idKomik,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sinopsis' => $this->request->getVar('sinopsis'),
            'genre' => implode("," , $genre),
            'sampul' => $namaSampul

        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        // untuk mengirimkan session pemberitahuan berhasil jika data sudah berhasil ditambahkan

        //ada dua parameter yaitu setFlashdata('nama nya apa', 'Pesannya gimana/apa')

        return redirect()->to('/komik');
    }
    

}
