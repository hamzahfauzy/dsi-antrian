<div class="pbb-result-container">
    <?php foreach($data->years as $year): ?>
    <button class="btn mb-2 <?=$data->pbb->tahun == $year ? 'btn-primary' : 'btn-success'?>" onclick="cekPbbWithYear('<?=$data->pbb->nop?>','<?=$year?>')"><?=$year?></button>
    <?php endforeach ?>
    <p></p>
    <h2>Tahun Pajak <?=$data->pbb->tahun?></h2>
    <p></p>
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th>Letak Objek Pajak</th>
            <th>Nama dan Alamat Wajib Pajak</th>
        </tr>
        <tr>
            <td><?=$data->pbb->letak_objek_pajak?></td>
            <td><?=$data->pbb->nama_alamat_wajib_pajak?></td>
        </tr>
    </table>
    <table class="table table-striped table-bordered table-hover">
        <tbody>
        <tr>
            <th>Objek Pajak</th>
            <th>Luas (M<sup>2</sup>)</th>
            <th>Kelas</th>
            <th>NJOP Per M<sup>2</sup> (Rp)</th>
            <th>Total NJOP (Rp)</th>
        </tr>
        <tr>
            <td>
                BUMI<br>
                BANGUNAN<br>
            </td>
            <td align="center">
                <?=$data->pbb->luas_op_bumi?><br>
                <?=$data->pbb->luas_op_bangunan?>
            </td>
            <td align="center">
                <?=$data->pbb->kelas_op_bumi?><br>
                <?=$data->pbb->kelas_op_bangunan?>									 
            </td>
            <td align="right">
                <?=$data->pbb->njop_per_m_op_bumi?><br>
                <?=$data->pbb->njop_per_m_op_bangunan?>
            </td>
            <td align="right">
                <?=$data->pbb->total_njop_op_bumi?><br>
                <?=$data->pbb->total_njop_op_bangunan?>
            </td>
        </tr>
        </tbody>
    </table>
    <table class="table table-striped table-bordered table-hover">
        <tbody>
            <tr>
                <td>NJOP sebagai dasar pengenaan PBB</td>
                <td align="right"><?=$data->pbb->njop_dasar?></td>
            </tr>
            <tr>
                <td>NJOPTKP ( NJOP Tidak Kena Pajak )</td>
                <td align="right"><?=$data->pbb->njop_tkp?></td>
            </tr>
            <tr>
                <td>NJOP untuk penghitungan PBB</td>
                <td align="right"><?=$data->pbb->njop_pbb?></td>
            </tr>
            <tr>
                <td>Pengenaan PBB 0,1%</td>
                <td align="right"><?=$data->pbb->pbb_terhutang?></td>
            </tr>
            <tr>
                <td>Tanggal Jatuh Tempo</td>
                <td align="right"><?=$data->pbb->tanggal_jatuh_tempo?></td>
            </tr>
            <tr>
                <td>Denda Administrasi 2% Sebulan</td>
                <td align="right"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <?=$data->pbb->jumlah_pembayaran?>
                </td>
            </tr>
            <tr>
                <td>Status Pembayaran</td>
                <td align="center">
                    <?php if($data->pbb->status_pembayaran == 0): ?>
                    <label class="badge badge-danger"><i class="fas fa-ban"></i> TERHUTANG</label>
                    <?php else: ?>
                    <label class="badge badge-success"><i class="fas fa-check"></i> LUNAS</label>
                    <?php endif ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>