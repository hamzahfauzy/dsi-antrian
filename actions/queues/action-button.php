<?php

if(Session::get('pos') && $d->status == 'menunggu')
{
    $pos = $db->single('pos',['id'=>$d->pos_id]);
    $service = $db->single('services',['id'=>$d->service_id]);
    return '<button class="btn btn-success" onclick="responsiveVoice.speak(\'Nomor Antrian '.$pos->code.' '.$d->number.', Silahkan ke, '.$pos->name.'\',\'Indonesian Female\');">Panggil</button>
            <a href="'.routeTo('queues/finish',['id'=>$d->id]).'" onclick="if(confirm(\'Apakah anda yakin telah menyelesaikan pelayanan ini ?\')){return true}else{return false}" class="btn btn-primary">Selesai</a>
            <!--<a href="'.routeTo('queues/skip',['id'=>$d->id]).'" class="btn btn-warning">Lewatkan</a>-->
    ';
}

return '';