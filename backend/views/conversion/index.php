<?php
/* @var $this yii\web\View */


use yii\helpers\Html;

?>



<form class="" method="POST">
    <div class="item panel panel-default col-sm-4" style="padding: 10px; background: ">
    <div class="form-group">
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
        <label class="control-label">Сумма</label>
        <div>
            <?php $sumPicker = Yii::$app->request->post('uahsum'); ?>
            <?php $codePicker = Yii::$app->request->post('select_code'); ?>
            <?php if (isset($sumPicker) && !empty($sumPicker)) : ?>
                <div class="clearfix">
                    <div class="input-group">
                        <?= Html::input('raw', 'uahsum', $sumPicker, ['class'=> 'form-control', 'placeholder' => 'Ввидите сумму', 'pattern' => '(^\d+(?:[.]\d{1,100}|$)$)','required'=> true ]) ?>
                        <div class="input-group-btn">
                            <select name="select_code" style="height: 34px;" class="btn btn-default dropdown-toggle" title="">
                                <option value="UAH"<?=$codePicker == 'UAH' ? 'selected' : 'selected'?>>UAH</option>
                                <option value="EUR"<?=$codePicker == 'EUR' ? 'selected' : ''?>>EUR</option>
                                <option value="USD"<?=$codePicker == 'USD' ? 'selected' : ''?>>USD</option>
                                <option value="RUB"<?=$codePicker == 'RUB' ? 'selected' : ''?>>RUB</option>
                            </select>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="clearfix">
                    <div class="input-group">
                        <?= Html::input('raw', 'uahsum', null, ['class'=> 'form-control', 'placeholder' => 'Ввидите сумму', 'pattern' => '(^\d+(?:[.]\d{1,100}|$)$)', 'max' => '30', 'required'=> true]) ?>
                        <div class="input-group-btn">
                            <select name="select_code" style="height: 34px;" class="btn btn-default dropdown-toggle" title="">
                                <option value="UAH" selected>UAH</option>
                                <option value="EUR">EUR</option>
                                <option value="USD">USD</option>
                                <option value="RUB">RUB</option>
                            </select>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label">Дата</label>
        <div class="">
            <?= Html::input('raw', 'conversion_date', null, ['class'=> 'form-control', 'id' => 'datepicker', 'pattern' => '(^(((\d\d)(([02468][048])|([13579][26]))-02-29)|(((\d\d)(\d\d)))-((((0\d)|(1[0-2]))-((0\d)|(1\d)|(2[0-8])))|((((0[13578])|(1[02]))-31)|(((0[1,3-9])|(1[0-2]))-(29|30)))))$)']) ?>

        </div>
    </div>




        <label style="margin-bottom: 20px;" class="control-label">Доступная валюта для выбора</label>
        <br />
        <?php
        /**
         * EUR checkbox
         */
        $checkCheckbox = Yii::$app->request->post('valcode'); ?>
    <div class="form-group">
        <div class="col-sm-offset-1">
            <div class="material-switch">
                <?php if (!empty($checkCheckbox)): ?>
                <?php if (in_array('EUR', $checkCheckbox)) : ?>
                <input id="someSwitchOptionSuccess" name="valcode[]" type="checkbox" value="EUR" checked/>
                <?php else : ?>
                <input id="someSwitchOptionSuccess" name="valcode[]" type="checkbox" value="EUR"/>
                    <?php endif; ?>
                <?php else : ?>
                    <input id="someSwitchOptionSuccess" name="valcode[]" type="checkbox" value="EUR"/>
                <?php endif; ?>
                <label for="someSwitchOptionSuccess" class="label-success"></label>
                <span style="padding:5px;"><b>EUR</b></span>
            </div>
        </div>
    </div>

    <?php
    /**
     * USD checkbox
     */
    ?>
    <div class="form-group">
        <div class="col-sm-offset-1">
            <div class="material-switch">
                <?php if (!empty($checkCheckbox)): ?>
                    <?php if (in_array('USD', $checkCheckbox)) : ?>
                    <input id="someSwitchOptionSuccess2" name="valcode[]" type="checkbox" value="USD" checked/>
                    <?php else : ?>
                <input id="someSwitchOptionSuccess2" name="valcode[]" type="checkbox" value="USD"/>
                    <?php endif; ?>
                <?php else : ?>
                <input id="someSwitchOptionSuccess2" name="valcode[]" type="checkbox" value="USD"/>
                <?php endif; ?>
                <label for="someSwitchOptionSuccess2" class="label-success"></label>
                <span style="padding:5px;"><b>USD</b></span>
            </div>
        </div>
    </div>

        <?php
        /**
         * RUB checkbox
         */
        ?>
        <div class="form-group">
            <div class="col-sm-offset-1">
                <div class="material-switch">
                    <?php if (!empty($checkCheckbox)): ?>
                        <?php if (in_array('RUB', $checkCheckbox)) : ?>
                            <input id="someSwitchOptionSuccess3" name="valcode[]" type="checkbox" value="RUB" checked/>
                        <?php else : ?>
                            <input id="someSwitchOptionSuccess3" name="valcode[]" type="checkbox" value="RUB"/>
                        <?php endif; ?>
                    <?php else : ?>
                        <input id="someSwitchOptionSuccess3" name="valcode[]" type="checkbox" value="RUB"/>
                    <?php endif; ?>
                    <label for="someSwitchOptionSuccess3" class="label-success"></label>
                    <span style="padding:5px;"><b>RUB</b></span>
                </div>
            </div>
        </div>

        <?php
        /**
         * UAH checkbox
         */
        ?>
        <div class="form-group">
            <div class="col-sm-offset-1">
                <div class="material-switch">
                    <?php if (!empty($checkCheckbox)): ?>
                        <?php if (in_array('UAH', $checkCheckbox)) : ?>
                            <input id="someSwitchOptionSuccess4" name="valcode[]" type="checkbox" value="UAH" checked/>
                        <?php else : ?>
                            <input id="someSwitchOptionSuccess4" name="valcode[]" type="checkbox" value="UAH"/>
                        <?php endif; ?>
                    <?php else : ?>
                        <input id="someSwitchOptionSuccess4" name="valcode[]" type="checkbox" value="UAH"/>
                    <?php endif; ?>
                    <label for="someSwitchOptionSuccess4" class="label-success"></label>
                    <span style="padding:5px;"><b>UAH</b></span>
                </div>
            </div>
        </div>

    <div class="form-group">
        <div class="col-sm-offset-1">
            <button type="submit" class="btn btn-primary">Посчитать</button>
        </div>
    </div>
        </div>

</form>


<?php if (isset($postValueFromLink) && !empty($postValueFromLink) && $postValueFromLink !== null) : ?>

    <table class="table table-striped table-bordered table-hover">
    <thead>
    <tr>
        <th>Указанная сумма</th>
        <th>Результат конвертации</th>
        <th>Наименование валюты</th>
        <th>Курс валюты</th>
        <th>Трехбуквенный код страны</th>
        <th>Выбранная дата</th>
    </tr>
    </thead>
    <tbody>

    <?php
    foreach ($postValueFromLink as $ValueFromLinkForAll) :
        foreach ($postChooseValue as $ChooseValueRate) :
        $resultSum = $sumPicker / $ValueFromLinkForAll[0]['rate'] * $ChooseValueRate[0]['rate'];
        $rate = $ValueFromLinkForAll[0]['rate'] / $ChooseValueRate[0]['rate'];
        $finalSum = sprintf("%f",$resultSum);
            $round = round($finalSum, 3)?>
        <tr>
            <td><?= $sumPicker .' '. $ChooseValueRate[0]['cc']?></td>
            <td><?= $round ?></td>
            <td><?= $ValueFromLinkForAll[0]['txt'] ?></td>
            <td><?= round($rate, 10) ?></td>
            <td><?= $ValueFromLinkForAll[0]['cc'] ?></td>
            <td><?= $ValueFromLinkForAll[0]['exchangedate'] ?></td>
        </tr>

 <?php  endforeach;
    endforeach; ?>

    </tbody>
    </table>

<?php endif; ?>






