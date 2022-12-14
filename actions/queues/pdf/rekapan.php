<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
<img src="<?=$logo?>" alt="" style="width:100px;height:120px;" />
<h2 align="center" style="margin-top:-100px;margin-bottom:0;">BADAN PENDAPATAN DAERAH<br>KABUPATEN ASAHAN</h2>
<p align="center">Mekar Baru, Kec. Kota Kisaran Barat, Kabupaten Asahan, Sumatera Utara 21211</p>
<div style="height:20px"></div>
<hr>
<h3 align="center" style="margin-bottom:0;">REKAPITULASI</h3>
<p align="center">Tanggal Awal : <b><?=date('d-m-Y', strtotime($start_date))?></b> | Tanggal Akhir : <b><?=date('d-m-Y',strtotime($end_date))?></b></p>
<?php foreach($pos as $p): ?>
<h4><?=$p->name?></h4>
<table id="customers" style="width:100%;">
  <tr>
    <th>No</th>
    <th width="340">Layanan</th>
    <th>Jumlah Menunggu</th>
    <th>Jumlah Selesai</th>
    <th>Jumlah Total</th>
  </tr>
  <?php 
  $wait = 0; $finish = 0;
  foreach($p->services as $no => $d): 
    $wait += $d->queues_wait; 
    $finish += $d->queues_finish; 
  ?>
  <tr>
    <td><?=$no+1?></td>
    <td><?=$d->name?></td>
    <td><?=number_format($d->queues_wait)?></td>
    <td><?=number_format($d->queues_finish)?></td>
    <td><?=number_format($d->queues_wait+$d->queues_finish)?></td>
  </tr>
  <?php endforeach ?>
  <tr>
    <td></td>
    <td>Total</td>
    <td><?=number_format($wait)?></td>
    <td><?=number_format($finish)?></td>
    <td><?=number_format($wait+$finish)?></td>
  </tr>
</table>
<?php endforeach ?>