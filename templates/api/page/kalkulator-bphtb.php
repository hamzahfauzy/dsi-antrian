<div class="centered bg-white non-flex-center">
    <center>
        <img src="<?=asset('assets/img/logo-bwhite.webp')?>" alt="" width="100px">
        <h2>Kalkulator BPHTB</h2>
        <br>
    </center>
    <div class="calculator">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 wow fadeIn" data-wow-delay="0.10s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                <div class="contact-form">
                    <div class="form-group">
                        <label style="float:left">Jenis Hak :</label>
                        <select name="form[jenis_hak]" class="form-control">
                        <option value="">- Pilih Jenis Hak -</option>
                        <option value="2">HAK GUNA BANGUNAN</option>
                        <option value="3">HAK GUNA USAHA</option>
                        <option value="1">HAK MILIK</option>
                        <option value="5">HAK MILIK ATAS SATUAN RUMAH SUSUN</option>
                        <option value="4">HAK PAKAI</option>
                        <option value="6">HAK PERORANGAN</option>
                        <option value="7">HAK TANGGUNGAN</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label style="float:left">Jenis Perolehan Hak Atas Tanah dan Atau Bangunan :</label>
                        <select name="form[jenis_perolehan]" class="form-control" id="perolehan" onchange="perolehan()">
                        <option value="">- Pilih Jenis Perolehan -</option>
                        <option value="13">APHB</option>
                        <option value="3">HIBAH</option>
                        <option value="4">HIBAH WASIAT</option>
                        <option value="1">JUAL BELI</option>
                        <option value="14">LELANG</option>
                        <option value="6">PEMASUKAN DALAM PERSEROAN/BADAN HUKUM LAIN</option>
                        <option value="7">PEMISAHAN HAK</option>
                        <option value="10">PENINGKATAN HAK</option>
                        <option value="9">PERMOHONAN HAK</option>
                        <option value="15">PRONA / PTSL</option>
                        <option value="2">TUKAR MENUKAR</option>
                        <option value="5">WARIS</option>
                        <option value="8">WASIAT PHB (PEMBAGIAN HAK BERSAMA)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="jumlahPerekaman">
                        <label style="float:left">Harga Transaksi/Nilai Pasar :</label>
                        <input name="form[harga_transaksi]" value="0" id="hargaTransaksi" onkeypress="return isNumberKey(event)" class="form-control" type="text" autocomplete="off">
                    </div>
                    <div class="form-group" style="text-align:left">
                        <label>Nilai Perolehan Objek Pajak (NPOP) :</label>
                        <div class="msg-npop"><i><font color="#D32F2F">Pilih Jenis Perolehan terlebih dahulu </font></i></div>
                        <input type="text" readonly="" name="form[npop]" value="0" id="hasilNpop" onkeyup="sumBphtb();" onkeypress="return isNumberKey(event)" class="form-control input-npop">
                    </div>
                    <div class="form-group" style="text-align:left">
                        <label>Nilai Perolehan Objek Pajak Tidak Kena Pajak (NPOPTKP) :</label>
                        <div id="vNpoptkp"><b>0</b></div>
                        <input name="form[npoptkp]" value="0" id="npoptkp" class="form-control" type="hidden" readonly="">
                    </div>
                    <div class="form-group" style="text-align:left">
                        <label>Nilai Perolehan Objek Pajak Kena Pajak (NPOPKP) :</label>
                        <div id="vHasilNpopkp"><b>0</b></div>
                        <input name="form[npopkp]" value="" id="hasilNpopkp" class="form-control" type="hidden" readonly="">
                    </div>
                    <div class="form-group" style="text-align:left">
                        <label>Bea Perolehan Hak atas Tanah dan Bangunan yang terutang :</label>
                        <div id="vBphtbTerhutang"><b>0</b></div>
                        <input name="form[bphtb_terhutang]" value="" id="bphtbTerhutang" class="form-control" type="hidden" readonly="">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 wow fadeIn" data-wow-delay="0.10s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                <div class="contact-form">
                    <div class="form-group" style="text-align:left">
                        <label>Pengurangan (%) :</label>
                        <input type="text" name="form[pengurangan]" value="0" id="pengurangan" onkeyup="sumBphtb();" onkeypress="return isNumberKey(event)" class="form-control">
                    </div>
                    <div class="form-group" style="text-align:left">
                        <label>Total Pengurangan :</label>
                        <div id="vTotalPengurangan"><b>0</b></div>
                        <input name="form[total_pengurangan]" value="" id="totalPengurangan" class="form-control" type="hidden" readonly="">
                    </div>
                    <div class="form-group" style="text-align:left">
                        <label>Pengenaan BPHTB :</label>
                        <div id="vBphtb" style="font-size:40px;"><b>0</b></div>
                        <input name="form[bphtb]" value="" id="bphtb" class="form-control" type="hidden" readonly="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button data-page="api/page/homepage" class="btn btn-nav-page btn-warning">Kembali</button>
</div>