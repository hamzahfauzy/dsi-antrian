<div class="centered bg-white non-flex-center" id="centered-pbb">
    <center>
        <img src="http://103.15.243.147:81/app/media/images/logo.png" alt="" width="250px">
        <p></p>
        <a href="https://play.google.com/store/apps/details?id=com.dsi.smartpajak" target="_blank" title="Download Aplikasi di Playstore">
            <img src="http://103.15.243.147:81/app/media/images/play-store.png" width="100px">
        </a>
        <p></p>
        <form action="" method="post" onsubmit="cekPbb(this); return false">
            <!-- Our form fields -->
            <div class="form-group">
                <label>Nomor Objek Pajak</label>
                <input class="form-control" id="nop" name="nop" type="text" value="" required>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Cari <i class="fas fa-search"></i></button>
                <button type="button" data-page="api/page/homepage" class="btn btn-nav-page btn-warning">Kembali</button>
            </div>
        </form>
    </center>
    <div class="result"></div>
</div>