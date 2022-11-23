<?php

return [
    'dashboard' => 'default/index',
    'pos' => 'crud/index?table=pos',
    'services' => 'crud/index?table=services',
    'queues' => 'crud/index?table=queues',
    'screen_savers' => 'crud/index?table=screen_savers',
    'pengguna'  => [
        'semua pengguna' => 'users/index',
        'roles' => 'roles/index'
    ],
    'pengaturan' => 'application/index'
];