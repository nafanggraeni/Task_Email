<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductEmail extends Migration
{
    public function up()
    {
        $fields = [
            "id" => [
                "type"=> "INT",
                "unsigned"=> true,
                "auto_increment"=> true,
            ],
            "name" => [
                "type"=> "VARCHAR",
                "constraint" => "200",
            ],
            "email" => [
                "type"=> "VARCHAR",
                "constraint" => "200",
            ],
            "created_at" => [
                "type"=> "VARCHAR",
                "constraint" => "200",
            ],
            "created_at DATETIME  DEFAULT CURRENT_TIMESTAMP",
        ];
        $this->forge->addKey('id', true);
        $this->forge->addKey('email');
        $this->forge->addField($fields);
        $this->forge->createTable('emails', true); //If NOT EXISTS create table products
    }

    public function down()
    {
        $this->forge->dropTable('emails', true); //If Exists drop table products
    }
}
