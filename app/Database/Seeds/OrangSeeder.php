<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class OrangSeeder extends Seeder
{
    public function run()
    {
        // $data = [
        //     [
        //     // key nya
        //     'nama' => 'Andhika Putra',
        //     'alamat'    => 'jl.in aja dulu',
        //     'created_at' => Time::now(),
        //     'updated_at' => Time::now(),
        //     ],
        //     [
        //     // key nya
        //     'nama' => 'Steve Ulrich',
        //     'alamat'    => 'jl.jalan',
        //     'created_at' => Time::now(),
        //     'updated_at' => Time::now(),
        //     ],
        //     [
        //     // key nya
        //     'nama' => 'Arya Bagus Permenit',
        //     'alamat'    => 'jl.nya sendirian sekarang :b',
        //     'created_at' => Time::now(),
        //     'updated_at' => Time::now(),
        //     ],
        // ];



        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 20; $i++){

            $data = [
                'nama' => $faker->name,
                'alamat' => $faker->address,
            'created_at' => Time::now('Asia/Jakarta'),
            'updated_at' => Time::now('Asia/Jakarta'),
        ];
        $this->db->table('orang')->insert($data);
    }

        // // Simple Queries
        // $this->db->query('INSERT INTO orang (nama, alamat, created_at, updated_at) VALUES(:nama:, :alamat:, :created_at:, :updated_at:)', $data);
        // //           harus sama dengan(nama dalam field db), (key yang ada didalam $data)


        // Using Query Builder
        // $this->db->table('orang')->insert($data);
        // diatas untuk insert satu satu
        // $this->db->table('orang')->insertBatch($data);
        // dan yang insertBatch() untuk menginsert nilai ber array
    }
}
