<?php

namespace App\Models;

use CodeIgniter\Model;

class KomikModel extends Model
{
    protected $table = 'komik';
    protected $primaryKey = 'idKomik';
    protected $useTimestamps = true;
    protected $allowedFields = ['judul', 'slug', 'penulis', 'penerbit','sinopsis','genre', 'sampul',];
    
    /** disini kita bikin method sendiri di dalam models kita ,
     * getkomik() ini bisa menjalankan 2 hal 
     * -kalau ada parameter nya cari yang where (di controllers Komik),
     * tapi kalau tidak ada ambil semua data .
     */
    public function getKomik($slug = false) 
    {
        if ($slug == false) {
            return $this->findAll();
        }


        return $this->where(['slug' => $slug])->first();
    }
    public function getDataKomik(){
        $builder = $this->db->table('komik');
        $data = $builder->countAllResults();
        // $data = $builder->get()->getResult();
        return $data;
    }
    public function search($keyword){
        $builder = $this->table('komik');
        $builder->like('judul',$keyword);
        $builder->orlike('slug',$keyword);
        $builder->orlike('genre',$keyword);
        // $builder->orlike('penulis',$keyword);
        // $builder->orlike('penerbit',$keyword);
        // $builder->orlike('sinopsis',$keyword);
        // $builder->orlike('sampul',$keyword);
        return $builder;

        // return $this->table('orang')->('nama'$keyword);
    }
    
}