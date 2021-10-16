<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Createusertable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id' =>
            [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'fullname' =>
            [
                'type' => 'VARCHAR',
                'constraint' => '225'
            ],
            'email' =>
            [
                'type' => 'VARCHAR',
                'constraint' => '225'
            ],
            'password' =>
            [
                'type' => 'VARCHAR',
                'constraint' => '225'
            ],
            'created_at' =>
            [
                'type' => 'varchar',
                'constraint' => 250,
                'null' => true,
                'on update' => 'NOW()'
            ],
            'updated_at' =>
            [
                'type' => 'varchar',
                'constraint' => 250,
                'null' => true,
                'on update' => 'NOW()'
            ],
        ]);
        $this->forge->addKey('user_id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
