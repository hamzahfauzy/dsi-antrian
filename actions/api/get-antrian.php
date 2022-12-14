<?php
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\Printer;

// $connector = new NetworkPrintConnector("192.168.95.113");
// $printer = new Printer($connector);
try {
    //code...
    $connector = new WindowsPrintConnector(config('printer_name'));
    $printer = new Printer($connector);

    $conn = conn();
    $db   = new Database($conn);
    $service_id  = $_POST['service_id'];
    $service = $db->single('services',['id'=>$service_id]);
    $pos = $db->single('pos',['id'=>$service->pos_id]);
    $db->query = "SELECT * FROM queues WHERE pos_id=$pos->id AND created_at LIKE '%".date('Y-m-d')."%' ORDER BY id DESC";
    $last_queues = $db->exec('single');
    $next = $last_queues ? $last_queues->number+1 : 1;
    $queue = $db->insert('queues',[
        'pos_id' => $service->pos_id,
        'service_id' => $service->id,
        'number' => $next,
        'status' => 'menunggu'
    ]);

    $where = (isset($where) && !empty($where) ? ' AND ' : ' WHERE ') . ' pos_id='.Session::get('pos').' ';

    $db->query = "SELECT * FROM queues WHERE pos_id=$pos->id AND status='menunggu' AND created_at LIKE '%".date('Y-m-d')."%'";
    $data  = $db->exec('exists');

    $printer -> setJustification(Printer::JUSTIFY_CENTER);
    $printer -> setTextSize(1, 1);
    $printer -> text("BADAN PENDAPATAN DAERAH\n");
    $printer -> setTextSize(2, 2);
    $printer -> text("KABUPATEN ASAHAN\n");
    $printer -> text("----------------\n");
    $printer -> setTextSize(1, 1);
    $printer -> text(tgl_indo()."       ".date("H:i:s")."\n");
    $printer -> text($pos->code." ".$pos->name."\n");
    $printer -> text("NOMOR ANTRIAN ANDA\n");
    $printer -> setTextSize(4, 4);
    $printer -> text($pos->code." $next\n");
    $printer -> setTextSize(1, 1);
    $printer -> text("Silahkan Menunggu Nomor Antrian Anda Dipanggil\n");
    $printer -> text("Jumlah Antrian Yang Belum\nDipanggil - ".$data."\n");
    $printer -> cut();
    $printer -> close();
    
    echo json_encode([
        'status' => 'success',
        'data' => $queue,
        'last_queue' => $last_queues
    ]);
} catch (\Throwable $th) {
    throw $th;
}
die();