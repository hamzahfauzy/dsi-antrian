<?php
use Spipu\Html2Pdf\Html2Pdf;

$table = 'queues';
Page::set_title(_ucwords(__($table)));
$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');
$fields = config('fields')[$table];

if(file_exists('../actions/'.$table.'/override-index-fields.php'))
    $fields = require '../actions/'.$table.'/override-index-fields.php';

$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m').'-01';
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d');
$pos_id = isset($_GET['pos_id']) ? $_GET['pos_id'] : '';
$service_id = isset($_GET['service_id']) ? $_GET['service_id'] : '';
$status = isset($_GET['status']) ? $_GET['status'] : '';

$pos = $db->all('pos');


if(isset($_GET['laporan']))
{
    $where = "WHERE (created_at BETWEEN '$start_date 00:00:00' AND '$end_date 23:59:59')";

    if($pos_id)
    {
        $where .= " AND pos_id=$pos_id";
    }
    
    if($service_id)
    {
        $where .= " AND service_id=$service_id";
    }
    
    if($status)
    {
        $where .= " AND status='$status'";
    }

    $db->query = "SELECT * FROM $table $where ORDER BY created_at DESC, status ASC, `number` ASC, pos_id ASC";
    $data  = $db->exec('all');

    $path = 'logo.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data_logo = file_get_contents($path);
    $logo = 'data:image/' . $type . ';base64,' . base64_encode($data_logo);

    ob_start();
    require 'pdf/laporan.php';
    $html = ob_get_contents(); 
    ob_end_clean();
    
    $html2pdf = new Html2Pdf();
    $html2pdf->writeHTML($html);
    $html2pdf->output();

    die();
}
    
if(isset($_GET['rekapan']))
{
    // jumlah pos -> layanan -> menunggu | selesai
    $pos = array_map(function($p) use ($db, $start_date, $end_date){
        $services = $db->all('services',['pos_id'=>$p->id]);
        $services = array_map(function($service) use ($db, $start_date, $end_date){
            $db->query = "SELECT * FROM queues WHERE status='menunggu' AND (created_at BETWEEN '$start_date 00:00:00' AND '$end_date 23:59:59') AND pos_id=$service->pos_id AND service_id=$service->id";
            $service->queues_wait = $db->exec('exists');

            $db->query = "SELECT * FROM queues WHERE status='selesai' AND (created_at BETWEEN '$start_date 00:00:00' AND '$end_date 23:59:59') AND pos_id=$service->pos_id AND service_id=$service->id";
            $service->queues_finish = $db->exec('exists');
            return $service;
        }, $services);

        $p->services = $services;

        return $p;
    }, $pos);

    $path = 'logo.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data_logo = file_get_contents($path);
    $logo = 'data:image/' . $type . ';base64,' . base64_encode($data_logo);

    ob_start();
    require 'pdf/rekapan.php';
    $html = ob_get_contents(); 
    ob_end_clean();
    
    $html2pdf = new Html2Pdf();
    $html2pdf->writeHTML($html);
    $html2pdf->output();

    die();
}

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

    $where = "WHERE (created_at BETWEEN '$start_date 00:00:00' AND '$end_date 23:59:59')";

    if($pos_id != '')
    {
        $where .= " AND pos_id=$pos_id";
    }
    
    if($service_id != '')
    {
        $where .= " AND service_id=$service_id";
    }
    
    if($status != '')
    {
        $where .= " AND status='$status'";
    }
    
    if($search_columns && $search)
    {
        $_where = [];
        foreach($search_columns as $col)
        {
            $_where[] = "$col LIKE '%$search%'";
        }
    
        $where = " AND (".implode(' OR ',$_where).")";
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
        if($table != 'queues' &&  is_allowed(get_route_path('crud/edit',['table'=>$table]),auth()->user->id)):
            $action .= '<a href="'.routeTo('crud/edit',['table'=>$table,'id'=>$d->id]).'" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i> Edit</a>';
        endif;
        if($table != 'queues' &&  is_allowed(get_route_path('crud/delete',['table'=>$table]),auth()->user->id)):
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

$data = [];
$stats = [];
$total = 0;
if(get_role(auth()->user->id)->name != 'administrator')
{
    if(Session::get('pos'))
    {
        $where = (isset($where) && $where ? ' AND ' : ' WHERE ') . ' pos_id='.Session::get('pos').' AND status="menunggu" AND created_at LIKE \'%'.date('Y-m-d').'%\'';
    }

    $db->query = "SELECT * FROM $table $where ORDER BY status ASC, `number` ASC, pos_id ASC";
    $data  = $db->exec('single');
    if($data)
    {
        $data->pos = $db->single('pos',['id'=>$data->pos_id]);
    }

    $total = $db->exists($table,[
        'pos_id' => Session::get('pos'),
        'created_at' => ['LIKE','%'.date('Y-m-d').'%']
    ]);

    $params = [];
    if(Session::get('pos'))
    {
        $params = ['pos_id' => Session::get('pos')];
    }

    $stats = [
        'queues_wait_today' => $db->exists('queues',array_merge($params,['status'=>'menunggu','created_at'=>['LIKE','%'.date('Y-m-d').'%']])),
        'queues_called_today' => $db->exists('queues',array_merge($params,['status'=>'selesai','created_at'=>['LIKE','%'.date('Y-m-d').'%']])),
    ];
}

return [
    'table' => $table,
    'success_msg' => $success_msg,
    'fields' => $fields,
    'data' => $data,
    'total' => $total,
    'stats' => $stats,
    'pos' => $pos,
    'start_date' => $start_date,
    'end_date' => $end_date,
    'pos_id' => $pos_id,
    'service_id' => $service_id,
    'status' => $status,
];
