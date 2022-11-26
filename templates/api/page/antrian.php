<div class="centered non-flex-center">
    <center>
        <img src="<?=asset('assets/img/logo-bwhite.webp')?>" alt="" width="100px">
        <h2 class="text-white">Loket Pelayanan</h2>
        <?php foreach($services as $service): ?>
        <button class="button ribbon-outset border" onclick="ambilAntrian(<?=$service->id?>)"><?=$service->name?></button>
        <?php endforeach ?>
        <p></p>
        <button data-page="api/page/homepage" class="btn-nav-page button ribbon-outset border back">Kembali</button>
    </center>
</div>