<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Createwallettable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'wallet_id' =>
            [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'user_id' =>
            [
                'type'           => 'INT',
            ],
            'amount' =>
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
        $this->forge->addKey('wallet_id', true);
        $this->forge->addForeignKey('user_id', 'users', 'user_id', 'CASCADE');
        $this->forge->createTable('wallets');
    }

    public function down()
    {
        $this->forge->dropTable('wallets');
    }
}
