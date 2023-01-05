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
    ],

    'survey_questions' => [
        'question' => [
            'label' => 'Pertanyaan',
            'type'  => 'textarea'
        ],
    ],

    'survey' => [
        'question' => [
            'label' => 'Pertanyaan',
            'type'  => 'text'
        ],
        'result' => [
            'label' => 'Pilihan',
            'type'  => 'options:Sangat Memuaskan|Memuaskan|Cukup Memuaskan|Kurang Memuaskan'
        ],
        'created_at' => [
            'label' => 'Tanggal',
            'type'  => 'datetime-local'
        ]
    ]
];