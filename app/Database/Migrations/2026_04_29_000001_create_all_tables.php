<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAllTables extends Migration
{
    public function up()
    {
        // 1. Table parcours
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nom'        => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => false],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('parcours');

        // 2. Table semestres
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nom'        => ['type' => 'VARCHAR', 'constraint' => '50', 'null' => false],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('semestres');

        // 3. Table users
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username'   => ['type' => 'VARCHAR', 'constraint' => '50', 'null' => false, 'unique' => true],
            'password'   => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => false],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('username');
        $this->forge->createTable('users');

        // 4. Table etudiants
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nom'         => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => false],
            'prenom'      => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => true],
            'id_parcours' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_parcours', 'parcours', 'id', 'CASCADE', 'SET NULL');
        $this->forge->createTable('etudiants');

        // 5. Table ues
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'code'        => ['type' => 'VARCHAR', 'constraint' => '20', 'null' => false, 'unique' => true],
            'libelle'     => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => false],
            'credits'     => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'id_semestre' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'id_parcours' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('code');
        $this->forge->addForeignKey('id_semestre', 'semestres', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_parcours', 'parcours', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('ues');

        // 6. Table notes
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_etudiant' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => false],
            'id_ue'       => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => false],
            'note'        => ['type' => 'DECIMAL', 'constraint' => '4,2', 'null' => false],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_etudiant', 'etudiants', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_ue', 'ues', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('notes');
    }

    public function down()
    {
        $this->forge->dropTable('notes');
        $this->forge->dropTable('ues');
        $this->forge->dropTable('etudiants');
        $this->forge->dropTable('users');
        $this->forge->dropTable('semestres');
        $this->forge->dropTable('parcours');
    }
}
