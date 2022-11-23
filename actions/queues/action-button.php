<?php

if(Session::get('pos') && $d->status == 'menunggu')
{
    return '<button class="btn btn-success">Panggil</button>
            <a href="'.routeTo('queues/finish',['id'=>$d->id]).'" onclick="if(confirm(\'Apakah anda yakin telah menyelesaikan pelayanan ini ?\')){return true}else{return false}" class="btn btn-primary">Selesai</a>
            <!--<a href="'.routeTo('queues/skip',['id'=>$d->id]).'" class="btn btn-warning">Lewatkan</a>-->
    ';
}

return '';