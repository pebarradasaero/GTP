<?php

return [
    'userManagement' => [
        'title'          => 'Gestão de Utilizadores',
        'title_singular' => 'Gestão de Utilizadores',
    ],
    'permission' => [
        'title'          => 'Permissões',
        'title_singular' => 'Permissão',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Grupos',
        'title_singular' => 'Função',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Utilizadores',
        'title_singular' => 'Utilizador',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'username'                 => 'Username',
            'username_helper'          => ' ',
        ],
    ],
    'juntasFreguesium' => [
        'title'          => 'Juntas Freguesia',
        'title_singular' => 'Juntas Freguesium',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'nome'              => 'Nome',
            'nome_helper'       => ' ',
            'localidade'        => 'Localidade',
            'localidade_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'gestao' => [
        'title'          => 'Gestao',
        'title_singular' => 'Gestao',
    ],
    'grupo' => [
        'title'          => 'Grupos',
        'title_singular' => 'Grupo',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'nome'              => 'Nome',
            'nome_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'equipa' => [
        'title'          => 'Equipas',
        'title_singular' => 'Equipa',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'nome'              => 'Nome',
            'nome_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'grupo'             => 'Grupo',
            'grupo_helper'      => ' ',
        ],
    ],
    'atividade' => [
        'title'          => 'Atividades',
        'title_singular' => 'Atividade',
    ],
    'actividadejf' => [
        'title'          => 'Actividade JF',
        'title_singular' => 'Actividade JF',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'jf'                => 'JF',
            'jf_helper'         => ' ',
            'grupo'             => 'Grupo',
            'grupo_helper'      => ' ',
            'equipa'            => 'Equipa',
            'equipa_helper'     => ' ',
            'atividade'         => 'Actividade',
            'atividade_helper'  => ' ',
            'simpatia'          => 'Simpatia',
            'simpatia_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'created_by'        => 'Created By',
            'created_by_helper' => ' ',
        ],
    ],
    'atividadeparticipante' => [
        'title'          => 'Atividade Participantes',
        'title_singular' => 'Atividade Participante',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'jf'                => 'JF',
            'jf_helper'         => ' ',
            'grupo'             => 'Grupo',
            'grupo_helper'      => ' ',
            'equipa'            => 'Equipa',
            'equipa_helper'     => ' ',
            'petisco'           => 'Petisco',
            'petisco_helper'    => ' ',
            'bebida'            => 'Bebida',
            'bebida_helper'     => ' ',
            'atividade'         => 'Atividade',
            'atividade_helper'  => ' ',
            'regularidade1'         => 'Regularidade 1',
            'regularidade1_helper'  => ' ',
            'regularidade2'         => 'Regularidade 2',
            'regularidade2_helper'  => ' ',
            'tempogasto'         => 'Tempo Gasto',
            'tempogasto_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'created_by'        => 'Created By',
            'created_by_helper' => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'registoRegularidade' => [
        'title'          => 'Registo Regularidade',
        'title_singular' => 'Registo Regularidade',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'grupo'                 => 'Grupo',
            'grupo_helper'          => ' ',
            'equipa'                => 'Equipa',
            'equipa_helper'         => ' ',
            'regularidade_1'        => 'Regularidade 1',
            'regularidade_1_helper' => ' ',
            'regularidade_2'        => 'Regularidade 2',
            'regularidade_2_helper' => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
        ],
    ],
];
