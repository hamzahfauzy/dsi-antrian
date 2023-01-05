<?php

$table = $_GET['table'];
Page::set_title(_ucwords(__($table)));
$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');
$fields = config('fields')[$table];

if($table == 'survey' && (isset($_GET['start_date']) && isset($_GET['end_date']) && isset($_GET['laporan'])))
{
    header('location:'.routeTo('survey/download',$_GET));
    die();
}

if(file_exists('../actions/'.$table.'/override-index-fields.php'))
    $fields = require '../actions/'.$table.'/override-index-fields.php';

if(isset($_GET['draw']))
{
    $draw    = $_GET['draw'];
    $start   = $_GET['start'];
    $length  = $_GET['length'];
    $search  = $_GET['search']['value'];
    $order   = $_GET['order'];
    
    $columns = [];
    $search_columns = [];
    foreach($fields as $key => $field)
    {
        $columns[] = is_array($field) ? $key : $field;
        if(is_array($field) && isset($field['search']) && !$field['search']) continue;
        $search_columns[] = is_array($field) ? $key : $field;
    }

    $orderKey = $order[0]['column']-1;
    $orderKey = $orderKey == -1 ? 'id' : $columns[$order[0]['column']-1];

    $where = "";

    if(!empty($search))
    {
        $_where = [];
        foreach($search_columns as $col)
        {
            $_where[] = "$col LIKE '%$search%'";
        }

        $where = "WHERE (".implode(' OR ',$_where).")";
    }

    if($table == 'survey' && (isset($_GET['start_date']) && isset($_GET['end_date'])))
    {
        $where = empty($where) ? 'WHERE ' : $where . ' AND ';
        $where .= ' (created_at >= "'.$_GET['start_date'].' 00:00:00" AND created_at <= "'.$_GET['end_date'].' 23:59:59")';
    }

    if(file_exists('../actions/'.$table.'/override-index.php'))
    {
        $override = require '../actions/'.$table.'/override-index.php';
        extract($override);
    }
    else
    {
        $db->query = "SELECT * FROM $table $where ORDER BY ".$orderKey." ".$order[0]['dir']." LIMIT $start,$length";
        $data  = $db->exec('all');

        $total = $db->exists($table,$where,[
            $orderKey => $order[0]['dir']
        ]);
    }

    $results = [];
    
    foreach($data as $key => $d)
    {
        $results[$key][] = $key+1;
        foreach($columns as $col)
        {
            $field = '';
            if(isset($fields[$col]))
            {
                $field = $fields[$col];
            }
            else
            {
                $field = $col;
            }
            $data_value = "";
            if(is_array($field))
            {
                $data_value = Form::getData($field['type'],$d->{$col},true);
                if($field['type'] == 'number')
                {
                    $data_value = number_format($data_value);
                }

                if($field['type'] == 'file')
                {
                    $data_value = '<a href="'.asset($data_value).'" target="_blank">Lihat File</a>';
                }
            }
            else
            {
                $data_value = $d->{$field};
            }

            $results[$key][] = $data_value;
        }

        $action = '';
        if(file_exists('../actions/'.$table.'/action-button.php'))
        {
            // $table, $d (data object)
            $action .= require '../actions/'.$table.'/action-button.php';
        }
        if(!in_array($table,['queues','survey']) &&  is_allowed(get_route_path('crud/edit',['table'=>$table]),auth()->user->id)):
            $action .= '<a href="'.routeTo('crud/edit',['table'=>$table,'id'=>$d->id]).'" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i> Edit</a>';
        endif;
        if(!in_array($table,['queues','survey']) &&  is_allowed(get_route_path('crud/delete',['table'=>$table]),auth()->user->id)):
            $action .= '<a href="'.routeTo('crud/delete',['table'=>$table,'id'=>$d->id]).'" onclick="if(confirm(\'apakah anda yakin akan menghapus data ini ?\')){return true}else{return false}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</a>';
        endif;
        $results[$key][] = $action;
    }

    echo json_encode([
        "draw" => $draw,
        "recordsTotal" => (int)$total,
        "recordsFiltered" => (int)$total,
        "data" => $results
    ]);

    die();
}

return [
    'table' => $table,
    'success_msg' => $success_msg,
    'fields' => $fields
];
