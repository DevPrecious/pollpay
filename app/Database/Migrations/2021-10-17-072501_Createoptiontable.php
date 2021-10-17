<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Createoptiontable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'option_id' =>
            [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'poll_id' =>
            [
                'type'           => 'INT',
            ],
            'option' =>
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
        $this->forge->addKey('option_id', true);
        $this->forge->addForeignKey('poll_id', 'polls', 'poll_id', 'CASCADE');
        $this->forge->createTable('options');
    }

    public function down()
    {
        $this->forge->dropTable('options');
    }
}
