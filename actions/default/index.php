<?php

Page::set_title('Dashboard');

$conn = conn();
$db   = new Database($conn);

$params = [];
if(Session::get('pos'))
{
    $params = ['pos_id' => Session::get('pos')];
}

$data = [
    'pos' => $db->exists('pos'),
    'services' => $db->exists('services'),
    'queues_wait' => $db->exists('queues',array_merge($params,['status'=>'menunggu'])),
    'queues_wait_today' => $db->exists('queues',array_merge($params,['status'=>'menunggu','created_at'=>['LIKE','%'.date('Y-m-d').'%']])),
    'queues_called' => $db->exists('queues',array_merge($params,['status'=>'selesai'])),
    'queues_called_today' => $db->exists('queues',array_merge($params,['status'=>'selesai','created_at'=>['LIKE','%'.date('Y-m-d').'%']])),
    'survey_total' => $db->exists('survey'),
    'survey_tidak_memuaskan' => $db->exists('survey',['result' => 'Tidak Memuaskan']),
    'survey_cukup_memuaskan' => $db->exists('survey',['result' => 'Cukup Memuaskan']),
    'survey_memuaskan' => $db->exists('survey',['result' => 'Memuaskan']),
    'survey_sangat_memuaskan' => $db->exists('survey',['result' => 'Sangat Memuaskan']),
];

return compact('data');