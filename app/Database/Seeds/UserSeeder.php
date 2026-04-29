<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nom'        => 'admin',
                'prenom'     => 'Admin',
                'pwd'        => password_hash('admin123', PASSWORD_BCRYPT),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nom'        => 'prof',
                'prenom'     => 'Professeur',
                'pwd'        => password_hash('prof123', PASSWORD_BCRYPT),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('users')->insertBatch($data);

        // Récupérer les IDs des groupes
        $adminGroup = $this->db->table('groups')->where('nom', 'admin')->first();
        $profGroup = $this->db->table('groups')->where('nom', 'prof')->first();

        // Récupérer les IDs des users
        $adminUser = $this->db->table('users')->where('nom', 'admin')->first();
        $profUser = $this->db->table('users')->where('nom', 'prof')->first();

        // Assigner les groupes
        if ($adminUser && $adminGroup) {
            $this->db->table('user_group')->insert([
                'user_id'    => $adminUser->id,
                'group_id'   => $adminGroup->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        if ($profUser && $profGroup) {
            $this->db->table('user_group')->insert([
                'user_id'    => $profUser->id,
                'group_id'   => $profGroup->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
