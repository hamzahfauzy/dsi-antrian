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
                        <?php if(!in_array($table,['queues','survey']) && is_allowed(get_route_path('crud/create',['table'=>$table]),auth()->user->id)): ?>
                            <a href="<?=routeTo('crud/create',['table'=>$table])?>" class="btn btn-secondary btn-round">Buat <?=_ucwords(__($table))?></a>
                        <?php endif ?>

                        <?php if($table == 'survey_questions'): ?>
                            <a href="<?=routeTo('crud/index',['table'=>'survey'])?>" class="btn btn-primary btn-round">Lihat Hasil</a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
        <?php if($table == 'survey'): ?>
            <div class="page-inner mt--5">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="" class="row">
                                <input type="hidden" name="table" value="survey">
                                <div class="form-group col">
                                    <label for="">Tanggal Awal</label>
                                    <input type="date" name="start_date" id="" class="form-control" value="<?=isset($_GET['start_date']) ? $_GET['start_date'] : ''?>">
                                </div>
                                <div class="form-group col">
                                    <label for="">Tanggal Akhir</label>
                                    <input type="date" name="end_date" id="" class="form-control" value="<?=isset($_GET['end_date']) ? $_GET['end_date'] : ''?>">
                                </div>
                                <div class="form-group col">
                                    <label for="">&nbsp;</label>
                                    <button class="btn btn-block btn-success"><i class="fas fa-filter fa-fw"></i> Filter</button>
                                </div>
                                <div class="form-group col">
                                    <label for="">&nbsp;</label>
                                    <button class="btn btn-block btn-primary" name="laporan" value="true"><i class="fas fa-download fa-fw"></i> Download</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif ?>
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
    </div>
<?php load_templates('layouts/bottom') ?>