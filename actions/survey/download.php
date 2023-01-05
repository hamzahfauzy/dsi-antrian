<?php
use Spipu\Html2Pdf\Html2Pdf;

$conn = conn();
$db   = new Database($conn);

$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m').'-01';
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d');

$where = "WHERE (created_at BETWEEN '$start_date 00:00:00' AND '$end_date 23:59:59')";
$db->query = "SELECT * FROM survey $where ORDER BY created_at DESC";
$data  = $db->exec('all');

$path = 'logo.png';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data_logo = file_get_contents($path);
$logo = 'data:image/' . $type . ';base64,' . base64_encode($data_logo);

$path = 'logo-2.png';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data_logo = file_get_contents($path);
$logo2 = 'data:image/' . $type . ';base64,' . base64_encode($data_logo);

ob_start();
require 'pdf/laporan.php';
$html = ob_get_contents(); 
ob_end_clean();

$html2pdf = new Html2Pdf();
$html2pdf->writeHTML($html);
$html2pdf->output('laporan-survey-'.date('YmdHis').'.pdf','D');

die();