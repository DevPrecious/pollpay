<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Createpolltable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'poll_id' =>
            [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'title' =>
            [
                'type' => 'VARCHAR',
                'constraint' => '225'
            ],
            'end_at' =>
            [
                'type' => 'VARCHAR',
                'constraint' => '500'

            ],
            'user_id' =>
            [
                'type'   => 'INT',
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
        $this->forge->addKey('poll_id', true);
        $this->forge->addForeignKey('user_id', 'users', 'user_id', 'CASCADE');
        $this->forge->createTable('polls');
    }

    public function down()
    {
        $this->forge->dropTable('polls');
    }
}
