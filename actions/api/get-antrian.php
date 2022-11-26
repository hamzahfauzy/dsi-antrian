<?php
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

$conn = conn();
$db   = new Database($conn);
$service_id  = $_POST['service_id'];
$service = $db->single('services',['id'=>$service_id]);
$pos = $db->single('pos',['id'=>$service->pos_id]);
$last_queues = $db->single('queues',['pos_id'=>$service->pos_id],['id'=>'desc']);
$next = $last_queues ? $last_queues->number+1 : 1;
$db->insert('queues',[
    'pos_id' => $service->pos_id,
    'service_id' => $service->id,
    'number' => $next,
    'status' => 'menunggu'
]);

$where = ($where ? ' AND ' : ' WHERE ') . ' pos_id='.Session::get('pos').' ';

$db->query = "SELECT * FROM queues WHERE pos_id=$pos->id AND status='menunggu' AND created_at LIKE '%".date('Y-m-d')."%'";
$data  = $db->exec('exists');

$connector = new WindowsPrintConnector(config('printer_name'));
$printer = new Printer($connector);
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> setTextSize(2, 2);
$printer -> text("---------------------------\n");
$printer -> text("DINAS PENDAPATAN\n");
$printer -> text("KABUPATEN ASAHAN\n");
$printer -> text("---------------------------\n");
$printer -> text(tgl_indo()."       ".date("H:i:s")."\n");
$printer -> text($pos->code." ".$pos->name."\n");
$printer -> text("NOMOR ANTRIAN ANDA\n");
$printer -> setTextSize(8, 8);
$printer -> text($pos->code." $next\n");
$printer -> setTextSize(2, 2);
$printer -> text("Silahkan Menunggu Sampai Antrian Anda Dipanggil\n");
$printer -> text("Jumlah Antrian Yang Belum Dipanggil - ".$data."\n");
$printer -> cut();
$printer -> close();

echo json_encode([
    'status' => 'success'
]);
die();