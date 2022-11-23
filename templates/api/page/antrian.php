<div class="centered">
    <center>
        <h2>Loket Pelayanan</h2>
        <?php foreach($services as $service): ?>
        <button class="btn btn-success" onclick="ambilAntrian(<?=$service->id?>)"><?=$service->name?></button>
        <?php endforeach ?>
        <p></p>
        <button data-page="api/page/homepage" class="btn btn-nav-page btn-warning">Kembali</button>
    </center>
</div>