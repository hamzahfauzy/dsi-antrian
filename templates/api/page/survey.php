<style>
.d-none {display:none}
.btn {
    zoom:1.3;
}
.btn-success {
    background-color:green;
    color:#FFF;
}
.btn:hover {
    color:#000;
}
.btn i.fa {
    zoom:3;
}
</style>
<div class="questions" style="text-align:center">
    <?php foreach($survey_questions as $index => $question): ?>
    <div class="question-item <?=$index > 0 ? 'd-none' : ''?>" id="question-<?=$index?>">
        <h1 style="color:#000"><?=$question->question?></h1>
        <button class="btn btn-success" onclick="nextQuestionTo(<?=$index+1?>, 'Kurang Memuaskan')"><i class="fa fa-frown-o"></i><br>Kurang Memuaskan</button>
        <button class="btn btn-success" onclick="nextQuestionTo(<?=$index+1?>, 'Cukup Memuaskan')"><i class="fa fa-meh-o"></i><br>Cukup Memuaskan</button>
        <button class="btn btn-success" onclick="nextQuestionTo(<?=$index+1?>, 'Memuaskan')"><i class="fa fa-smile-o"></i><br>Memuaskan</button>
        <button class="btn btn-success" onclick="nextQuestionTo(<?=$index+1?>, 'Sangat Memuaskan')"><i class="fa fa-smile-o"></i><br>Sangat Memuaskan</button>
    </div>
    <?php endforeach ?>
</div>