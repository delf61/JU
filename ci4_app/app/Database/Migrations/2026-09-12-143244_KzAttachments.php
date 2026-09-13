<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KzAttachments extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kz_b' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'path' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'original_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('kz_b');
        $this->forge->createTable('kz_prilohy');
    }

    public function down()
    {
        $this->forge->dropTable('kz_prilohy');
    }
}
