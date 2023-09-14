<?php

namespace App\Models;

use CodeIgniter\Model;

class GenreModel extends Model
{
    protected $table = 'genre';
    protected $useTimestamps = false;
    protected $allowedFields = ['nama_genre'];
    

    public function getGenre(){
        $genre = $this->findAll();
        return $genre;
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