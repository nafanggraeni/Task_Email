<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPhotoColumnToProduct extends Migration
{
    public function up()
    {
        $fields = [
            "photo" => [
                "type"=> "TEXT",
            ],
        ];

        $this->forge->addColumn('products', $fields);
        $this->forge->addColumn('edit', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('products', 'photo');
        $this->forge->dropColumn('edit', 'photo');
    }
}