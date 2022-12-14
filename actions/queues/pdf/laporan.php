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
<h3 align="center" style="margin-bottom:0;">LAPORAN ANTRIAN</h3>
<p align="center">Tanggal Awal : <b><?=date('d-m-Y', strtotime($start_date))?></b> | Tanggal Akhir : <b><?=date('d-m-Y',strtotime($end_date))?></b></p>
<table id="customers" style="width:100%;">
  <tr>
    <th>No</th>
    <th>POS</th>
    <th>Layanan</th>
    <th>No. Antrian</th>
    <th>Status</th>
    <th>Waktu Antri</th>
    <th>Waktu Selesai</th>
  </tr>
  <?php foreach($data as $no => $d): ?>
  <tr>
    <td><?=$no+1?></td>
    <td width="90"><?=Form::getData('options-obj:pos,id,name',$d->pos_id,true);?></td>
    <td width="110"><?=Form::getData('options-obj:services,id,name',$d->service_id,true);?></td>
    <td><?=$d->number?></td>
    <td><?=$d->status?></td>
    <td><?=$d->created_at?></td>
    <td width="100"><?=$d->updated_at?></td>
  </tr>
  <?php endforeach ?>
</table>