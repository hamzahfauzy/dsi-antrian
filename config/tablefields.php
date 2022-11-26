<?php

return [
    'pos' => [
        'name' => [
            'label' => 'Nama',
            'type'  => 'text'
        ],
        'code' => [
            'label' => 'Kode',
            'type'  => 'text'
        ]
    ],
    
    'services' => [
        'pos_id' => [
            'label' => 'Pos',
            'type' => 'options-obj:pos,id,name'
        ],
        'name' => [
            'label' => 'Nama',
            'type'  => 'text'
        ]
    ],
    
    'queues' => [
        'pos_id' => [
            'label' => 'Pos',
            'type' => 'options-obj:pos,id,name'
        ],
        'service_id' => [
            'label' => 'Layanan',
            'type' => 'options-obj:services,id,name'
        ],
        'number'=> [
            'label' => 'No. Antrian',
            'type' => 'text'
        ],
        'status',
        'created_at' => [
            'label' => 'Waktu Antri',
            'type' => 'text'
        ],
        'updated_at' => [
            'label' => 'Waktu Selesai',
            'type' => 'text'
        ],
    ],

    'screen_savers' => [
        'file' => [
            'label' => 'File',
            'type'  => 'file'
        ]
    ]
];