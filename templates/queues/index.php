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
                            <form action="" class="row">
                                <div class="form-group col">
                                    <label for="">Tanggal Awal</label>
                                    <input type="date" name="start_date" id="" class="form-control" value="<?=$start_date?>">
                                </div>
                                <div class="form-group col">
                                    <label for="">Tanggal Akhir</label>
                                    <input type="date" name="end_date" id="" class="form-control" value="<?=$end_date?>">
                                </div>
                                <div class="form-group col">
                                    <label for="">POS</label>
                                    <select name="pos_id" class="form-control" onchange="loadServices(this.value)">
                                        <option value="">Semua</option>
                                        <?php foreach($pos as $p): ?>
                                        <option value="<?=$p->id?>" <?=$pos_id == $p->id ? 'selected=""' : ''?>><?=$p->name?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label for="">Layanan</label>
                                    <select name="service_id" class="form-control" disabled>
                                        <option value="">Semua</option>
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label for="">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="">Semua</option>
                                        <option value="menunggu" <?=$status == 'menunggu' ? 'selected=""' : ''?>>Menunggu</option>
                                        <option value="selesai" <?=$status == 'selesai' ? 'selected=""' : ''?>>Selesai</option>
                                    </select>
                                </div>
                                <div class="col-12"></div>
                                <div class="col-12 col-sm-4">
                                    <button class="btn btn-block btn-success"><i class="fas fa-filter fa-fw"></i> Filter</button>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <button class="btn btn-block btn-primary" name="laporan" value="true"><i class="fas fa-download fa-fw"></i> Download Laporan</button>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <button class="btn btn-block btn-info" name="rekapan" value="true"><i class="fas fa-download fa-fw"></i> Download Rekapitulasi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    <script>
    async function loadServices(pos_id, selected_id = false)
    {
        var service = document.querySelector('[name=service_id]')
        service.innerHTML = '<option value="">Semua</option>'
        if(pos_id == '')
        {
            service.disabled = true
            return
        }
        var request = await fetch('<?=routeTo('api/get-services-by-pos')?>?pos_id='+pos_id)
        if(request.ok)
        {
            try {
                var response = await request.json()
                service.disabled = false
                var data = response.data
                for(d in data)
                {
                    var _data = data[d]
                    service.innerHTML += '<option value="'+_data.id+'" '+(selected_id==_data.id?"selected":"")+'>'+_data.name+'</option>'
                }
            } catch (error) {
                alert(error)
            }
        }
    }

    <?php if($service_id): ?>
    loadServices(<?=$pos_id?>,<?=$service_id?>);
    <?php endif ?>
    </script>
<?php load_templates('layouts/bottom') ?>