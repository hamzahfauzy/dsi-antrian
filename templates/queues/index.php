<?php load_templates('layouts/top') ?>
    <div class="content">
        <div class="panel-header <?=config('theme')['panel_color']?>">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold"><?=_ucwords(__($table))?></h2>
                        <h5 class="text-white op-7 mb-2">Memanajemen data <?=_ucwords(__($table))?></h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <?php if($table != 'queues' && is_allowed(get_route_path('crud/create',['table'=>$table]),auth()->user->id)): ?>
                            <a href="<?=routeTo('crud/create',['table'=>$table])?>" class="btn btn-secondary btn-round">Buat <?=_ucwords(__($table))?></a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
        <?php if(get_role(auth()->user->id)->name == 'administrator'): ?>
        <div class="page-inner mt--5">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <?php if($success_msg): ?>
                            <div class="alert alert-success"><?=$success_msg?></div>
                            <?php endif ?>
                            <div class="table-responsive table-hover table-sales">
                                <table class="table datatable-crud">
                                    <thead>
                                        <tr>
                                            <th width="20px">#</th>
                                            <?php 
                                            foreach($fields as $field): 
                                                $label = $field;
                                                if(is_array($field))
                                                {
                                                    $label = $field['label'];
                                                }
                                                $label = _ucwords($label);
                                            ?>
                                            <th><?=$label?></th>
                                            <?php endforeach ?>
                                            <th class="text-right">
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>
        <div class="page-inner mt--5">
            <div class="row">
                <div class="col-12 col-sm-4 m-auto">
                    <div class="card">
                        <div class="card-body text-center">
                            <?php if($data): ?>
                            <h3>No Antrian Sekarang</h3>
                            <h1><?=$data->pos->code?> <?= $data->number ?></h1>
                            <button class="btn btn-success" onclick="responsiveVoice.speak('Nomor Antrian. <?=$data->pos->code?> <?=$data->number?>. Silahkan ke <?=$data->pos->name?>.','Indonesian Female');">Panggil</button>
                            <a href="<?=routeTo('queues/finish',['id'=>$data->id])?>" onclick="if(confirm('Apakah anda yakin telah menyelesaikan pelayanan ini ?')){return true}else{return false}" class="btn btn-primary">Selesai</a>
                            <?php else: ?>
                                <?php if($total): ?>
                                    <h3><i>Antrian Selesai</i></h3>
                                <?php else: ?>
                                    <h3><i>Tidak ada antrian</i></h3>
                                <?php endif ?>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-inner mt--5">
            <h2>Statistik Hari ini</h2>
            <div class="row row-card-no-pd">
                <div class="col-sm-6 col-12">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-error text-danger"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Jumlah Antrian Menunggu</p>
                                        <h4 class="card-title"><?=number_format($stats['queues_wait_today'])?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-12">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-twitter text-primary"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Jumlah Antrian Terpanggil</p>
                                        <h4 class="card-title"><?=number_format($stats['queues_called_today'])?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif ?>
    </div>
<?php load_templates('layouts/bottom') ?>