<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Createvotetable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'vote_id' =>
            [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'poll_id' =>
            [
                'type'           => 'INT',
            ],
            'option_id' =>
            [
                'type'           => 'INT',
            ],
            'user_id' =>
            [
                'type' => 'INT',
            ],
            'staked' =>
            [
                'type' => 'INT',
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
        $this->forge->addKey('vote_id', true);
        $this->forge->createTable('votes');
    }

    public function down()
    {
        $this->forge->dropTable('votes');
    }
}
