<?php
/* @var $this yii\web\View */
use yii\helpers\Html;

?>
<h1>Переводчик</h1>

<form method="post" id="theForm">
    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
<div class="form-group col-sm-6">
    <div class="input-btn pull-right" style="padding-bottom:15px;">
        <select id = 'choose_language' name="choose_language" style="height: 34px;" class="btn btn-default dropdown-toggle" title="">
            <?php
            asort($all_lenguages['langs']);
            foreach ($all_lenguages['langs'] as $lankey => $lanvalue) { ?>
            <option value="<?=!empty(Yii::$app->request->post('choose_language')) ? $lankey : "ru"?>"<?=Yii::$app->request->post('choose_language') == $lankey ? 'selected' : ''?>>
                <?=!empty(Yii::$app->request->post('choose_language')) ? $lanvalue : "Русский" ?></option>
            <?php } ?>
        </select>
    </div>
    <div id="form">
        <?= Html::textarea('post_text', Yii::$app->request->post('post_text'), ['class'=> 'form-control','rows' => 5, 'placeholder' => '', 'pattern' => '', 'required'=> true]) ?>
    </div>
    </div>
<div class="form-group col-sm-6" id="form">
    <div class="input-btn pull-left" style="padding-bottom:15px;">
        <select id = "do_translate_to" name="do_translate_to" style="height: 34px;" class="btn btn-default dropdown-toggle" title="">
            <?php foreach ($all_lenguages['langs'] as $lankey => $lanvalue) { ?>
                <option value="<?=!empty(Yii::$app->request->post('do_translate_to')) ? $lankey : "en"?>"<?=Yii::$app->request->post('do_translate_to') == $lankey ? 'selected' : ''?>>
                    <?=!empty(Yii::$app->request->post('do_translate_to')) ? $lanvalue : "Английский"?></option>
            <?php } ?>
        </select>
    </div>
    <div>
        <?= Yii::$app->request->post('post_text') ?
            Html::textarea('', $translate_text->text, ['class'=> 'form-control ','rows' => 5, 'placeholder' => '', 'pattern' => '']) :
            Html::textarea('', null, ['class'=> 'form-control','rows' => 5, 'placeholder' => '', 'pattern' => ''])?>
    </div>
</div>
    <button type="submit" class="btn btn-default" style="margin-left:15px;">Перевести</button>
    </form>
<div class="clearfix"></div>

