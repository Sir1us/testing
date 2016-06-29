<?php

namespace backend\controllers;
use backend\models\Cashier;
use backend\models\CashierAgreements;
use Yii;
use SimpleXMLElement;

class CashierController extends \yii\web\Controller
{
    /**
     * @param \yii\base\Action $action
     * @return bool
     * @throws \yii\web\BadRequestHttpException
     */
    public function beforeAction($action)
    {
        // ...set `$this->enableCsrfValidation` here based on some conditions...
        // call parent method that will check CSRF if such property is true.
        if ($action->id === 'index') {

            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

    /**
     * 
     */
    public function actionIndex()
    {
        
        if(Yii::$app->request->get('table') == 'cashier') {
            
            $AllCashier = Cashier::find()->asArray()->all();

            $jsonCashierInfo = [];
            foreach ($AllCashier as $valueCashier) {
                $jsonValuesForCashier = new \stdClass();
                $jsonValuesForCashier->cashier_id = $valueCashier['id'];
                $jsonValuesForCashier->cashier_name = $valueCashier['name'];
                $jsonValuesForCashier->cashier_second_name = $valueCashier['second_name'];
                $jsonValuesForCashier->agreement_id = $valueCashier['agreement_id'];

                $AllCashierAgreements = CashierAgreements::find()->where(['=', 'id', $valueCashier['agreement_id']])->orderBy('id')->limit(1)->asArray()->all();

                if (empty($AllCashierAgreements)) {
                    $jsonValuesForCashier->agreement_id = "Пусто";
                    $jsonCashierInfo[] = $jsonValuesForCashier;
                } else {
                    foreach ($AllCashierAgreements as $valueAgreements) {
                        $jsonValuesForCashier->agreement_number = $valueAgreements['number'];
                        $jsonValuesForCashier->agreement_date_from = $valueAgreements['date_from'];
                        $jsonValuesForCashier->agreement_date_to = $valueAgreements['date_to'];
                        $jsonCashierInfo[] = $jsonValuesForCashier;
                    }
                }
            }

            if (!Yii::$app->request->post('format'))  {
                $UnloadingCashier = json_encode($jsonCashierInfo);

                echo $UnloadingCashier;
            } 

        } else {

            echo '[{"errors": "Невалидный параметр table"}]';
        }

    }

}
