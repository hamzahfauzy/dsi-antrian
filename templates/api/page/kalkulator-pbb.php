<div class="centered bg-white non-flex-center">
    <center>
        <img src="<?=asset('assets/img/logo-bwhite.webp')?>" alt="" width="100px">
        <h2>Kalkulator PBB</h2>
        <br>
    </center>
    <div class="calculator">
        <div class="row">
            <div class="col-md-6 col-sm-12 wow fadeIn" data-wow-delay="0.10s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                <div class="contact-form">
                    <div class="form-group">
                        <label>Luas Tanah (M<sup>2</sup>) :</label>
                        <input name="form[luas_tanah]" value="" id="luasTanah" onkeyup="sumTanah();" onkeypress="return isNumberKey(event)" class="form-control" type="text" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>NJOP Tanah Per M<sup>2</sup> :</label>
                        <input name="form[njop_tanah]" value="0" id="njopTanah" onkeyup="sumTanah();" onkeypress="return isNumberKey(event)" class="form-control" "="" type="text" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Luas x NJOP Tanah :</label>
                        <input id="totalHasilNjopTanah" name="form[hasil_njop_tanah]" class="form-control" value="0" type="text" readonly="">
                    </div>
                    <div class="form-group">
                        <label>Total NJOP PBB :</label>
                        <input id="totalHasilNjop" name="form[hasil_njop]" value="0" type="text" class="form-control" readonly="">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 wow fadeIn" data-wow-delay="0.10s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                <div class="contact-form">
                    <div class="form-group">
                        <label>Luas Bangunan (M<sup>2</sup>) :</label>
                        <input name="form[luas_bangunan]" value="" id="luasBangunan" onkeyup="sumTanah();" onkeypress="return isNumberKey(event)" class="form-control" type="text" autocomplete="off" required="">
                    </div>
                    <div class="form-group">
                        <label>NJOP Bangunan Per M<sup>2</sup> :</label>
                        <input name="form[njop_bangunan]" value="0" id="njopBangunan" onkeyup="sumTanah();" onkeypress="return isNumberKey(event)" class="form-control" type="text" autocomplete="off" required="">
                    </div>
                    <div class="form-group">
                        <label>Luas x NJOP Bangunan :</label>
                        <input id="totalHasilNjopBangunan" name="form[hasil_njop_bangunan]" class="form-control" value="0" type="text" readonly="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button data-page="api/page/homepage" class="btn btn-nav-page btn-warning">Kembali</button>
</div>