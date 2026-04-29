<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAllTables extends Migration
{
    public function up()
    {
        // 1. Table semestre
        $this->forge->addField([
            'idSemestre' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'numero'     => ['type' => 'INT', 'constraint' => 11, 'null' => false],
            'libelle'    => ['type' => 'VARCHAR', 'constraint' => '50', 'null' => false],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('idSemestre', true);
        $this->forge->createTable('semestre');

        // 2. Table parcours
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nom'          => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => false],
            'responsable'  => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'created_at'   => ['type' => 'DATETIME', 'null' => true],
            'updated_at'   => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('parcours');

        // 3. Table ue
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'code'       => ['type' => 'VARCHAR', 'constraint' => '20', 'null' => false],
            'intitule'   => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => false],
            'credit'     => ['type' => 'INT', 'constraint' => 11, 'null' => false],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('code');
        $this->forge->createTable('ue');

        // 4. Table etudiant
        $this->forge->addField([
            'id'         => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'num_etu'    => ['type' => 'VARCHAR', 'constraint' => '20', 'null' => false],
            'nom'        => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => false],
            'prenom'     => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => false],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('num_etu');
        $this->forge->createTable('etudiant');

        // 5. Table groups
        $this->forge->addField([
            'id'         => [
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
        $this->forge->createTable('groups');

        // 6. Table users
        $this->forge->addField([
            'id'         => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nom'        => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => false],
            'prenom'     => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'pwd'        => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => false],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');

        // 7. Table user_group
        $this->forge->addField([
            'id'         => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id'    => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => false],
            'group_id'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => false],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('group_id', 'groups', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('user_group');

        // 8. Table parcour_ue
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'parcours_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => false],
            'ue_id'       => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => false],
            'semestre_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => false],
            'obli'        => ['type' => 'BOOLEAN', 'default' => true],
            'groupe'      => ['type' => 'VARCHAR', 'constraint' => '50', 'null' => true],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('parcours_id', 'parcours', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('ue_id', 'ue', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('semestre_id', 'semestre', 'idSemestre', 'CASCADE', 'CASCADE');
        $this->forge->createTable('parcour_ue');

        // 9. Table note
        $this->forge->addField([
            'id'         => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'etu_id'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => false],
            'ue_id'      => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => false],
            'valeur'     => ['type' => 'DECIMAL', 'constraint' => '4,2', 'null' => false],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('etu_id', 'etudiant', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('ue_id', 'ue', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('note');
    }

    public function down()
    {
        $this->forge->dropTable('note');
        $this->forge->dropTable('parcour_ue');
        $this->forge->dropTable('user_group');
        $this->forge->dropTable('users');
        $this->forge->dropTable('groups');
        $this->forge->dropTable('etudiant');
        $this->forge->dropTable('ue');
        $this->forge->dropTable('parcours');
        $this->forge->dropTable('semestre');
    }
}
