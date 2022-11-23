<?php
if(Session::get('pos'))
{
    $where = ($where ? ' AND ' : ' WHERE ') . ' pos_id='.Session::get('pos').' AND created_at LIKE \'%'.date('Y-m-d').'%\'';
}

$db->query = "SELECT * FROM $table $where ORDER BY status ASC LIMIT $start,$length";
$data  = $db->exec('all');

$total = $db->exists($table,$where,[
    'status' => 'ASC'
]);

return compact('data','total');