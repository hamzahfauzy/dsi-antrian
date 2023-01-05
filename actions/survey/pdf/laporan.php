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
<h2 align="center" style="margin-top:-100px;margin-bottom:0;">PEMERINTAH KABUPATEN ASAHAN<br>BADAN PENDAPATAN DAERAH</h2>
<p align="center">JL. PLAMBOYAN SIBOGAT, MEKAR BARU TELP. (0623) 41243</p>
<img src="<?=$logo2?>" alt="" style="width:100px;height:120px;float:right;margin-top:-120px;" />
<div style="height:20px"></div>
<hr>
<h3 align="center" style="margin-bottom:0;">LAPORAN SURVEY</h3>
<p align="center">Periode <b><?=date('d-m-Y', strtotime($start_date))?></b> s/d <b><?=date('d-m-Y',strtotime($end_date))?></b><br><?=date('H:i:s')?></p>
<table id="customers" style="width:100%;" align="center">
  <tr>
    <th>No</th>
    <th width="400">Pertanyaan</th>
    <th width="100">Pilihan</th>
    <th width="100">Tanggal</th>
  </tr>
  <?php foreach($data as $no => $d): ?>
  <tr>
    <td><?=$no+1?></td>
    <td><?=$d->question?></td>
    <td><?=$d->result?></td>
    <td><?=$d->created_at?></td>
  </tr>
  <?php endforeach ?>
</table>