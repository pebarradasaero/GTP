<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'juntas_freguesium_create',
            ],
            [
                'id'    => 18,
                'title' => 'juntas_freguesium_edit',
            ],
            [
                'id'    => 19,
                'title' => 'juntas_freguesium_show',
            ],
            [
                'id'    => 20,
                'title' => 'juntas_freguesium_delete',
            ],
            [
                'id'    => 21,
                'title' => 'juntas_freguesium_access',
            ],
            [
                'id'    => 22,
                'title' => 'gestao_access',
            ],
            [
                'id'    => 23,
                'title' => 'grupo_create',
            ],
            [
                'id'    => 24,
                'title' => 'grupo_edit',
            ],
            [
                'id'    => 25,
                'title' => 'grupo_show',
            ],
            [
                'id'    => 26,
                'title' => 'grupo_delete',
            ],
            [
                'id'    => 27,
                'title' => 'grupo_access',
            ],
            [
                'id'    => 28,
                'title' => 'equipa_create',
            ],
            [
                'id'    => 29,
                'title' => 'equipa_edit',
            ],
            [
                'id'    => 30,
                'title' => 'equipa_show',
            ],
            [
                'id'    => 31,
                'title' => 'equipa_delete',
            ],
            [
                'id'    => 32,
                'title' => 'equipa_access',
            ],
            [
                'id'    => 33,
                'title' => 'atividade_access',
            ],
            [
                'id'    => 34,
                'title' => 'actividadejf_create',
            ],
            [
                'id'    => 35,
                'title' => 'actividadejf_edit',
            ],
            [
                'id'    => 36,
                'title' => 'actividadejf_show',
            ],
            [
                'id'    => 37,
                'title' => 'actividadejf_delete',
            ],
            [
                'id'    => 38,
                'title' => 'actividadejf_access',
            ],
            [
                'id'    => 39,
                'title' => 'atividadeparticipante_create',
            ],
            [
                'id'    => 40,
                'title' => 'atividadeparticipante_edit',
            ],
            [
                'id'    => 41,
                'title' => 'atividadeparticipante_show',
            ],
            [
                'id'    => 42,
                'title' => 'atividadeparticipante_delete',
            ],
            [
                'id'    => 43,
                'title' => 'atividadeparticipante_access',
            ],
            [
                'id'    => 44,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 45,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 46,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
