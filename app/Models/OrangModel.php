<?php

namespace App\Models;

// use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class OrangModel extends Model
{
    // public function __construct(){
    //     $this->db = \Config\Database::connect();
    // }

    protected $table = 'orang';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'nama',
        'alamat',
    ];
    
    public function getOrang($nama = false){
        if ($nama == false) {
            return $this->findAll();
        }


        return $this->where(['nama' => $nama])->first();
    }
    public function search($keyword){
        $builder = $this->table('orang');
        $builder->like('nama',$keyword);
        $builder->orlike('alamat',$keyword);
        return $builder;

        // return $this->table('orang')->('nama'$keyword);
    }
    public function getDataOrang(){
        $builder = $this->db->table('orang');
        $data = $builder->countAllResults();
        // $data = $builder->get()->getResult();
        return $data;
    }

    // public function getOrang(){
    //     $db = db_connect('ci4-coba');
    //     $builder = $db->table('orang');

    //     $hasil = $builder->countAll();
        
    //     return $hasil;
    // }
}
