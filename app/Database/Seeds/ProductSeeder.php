<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name' => 'Nafa Anggraeni',
            'deskripsi'    => 'gatau',
        ];

        // Simple Queries
        $this->db->table('products')->insert($data);
        
        $data = [
            'name' => 'Mukhlis Setya Putra',
            'deskripsi'    => 'gatau',
        ];
        // Using Query Builder
        $this->db->table('products')->insert($data);
    }
}