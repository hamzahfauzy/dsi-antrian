<?php
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

$conn = conn();
$db   = new Database($conn);
$service_id  = $_POST['service_id'];
$service = $db->single('services',['id'=>$service_id]);
$last_queues = $db->single('queues',['pos_id'=>$service->pos_id],['id'=>'desc']);
$next = $last_queues ? $last_queues->number+1 : 1;
$db->insert('queues',[
    'pos_id' => $service->pos_id,
    'service_id' => $service->id,
    'number' => $next,
    'status' => 'menunggu'
]);

$connector = new WindowsPrintConnector(config('printer_name'));
$printer = new Printer($connector);
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> setTextSize(2, 2);
$printer -> text("DINAS PENDAPATAN\n");
$printer -> text("KABUPATEN ASAHAN\n");
$printer -> text("NOMOR ANTRIAN\n");
$printer -> setTextSize(8, 8);
$printer -> text("$next\n");
$printer -> cut();
$printer -> close();

echo json_encode([
    'status' => 'success'
]);
die();