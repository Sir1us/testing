<?php
namespace backend\controllers;


use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use linslin\yii2\curl;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }


/*    public function beforeAction($action)
    {
            $this->enableCsrfValidation = false;
                if (Yii::$app->request->get('table')) {
                    if ( Yii::$app->request->post('date_from') && Yii::$app->request->post('date_to')){
                        echo (new CashiersShiftController($this->id, $this->module))->actionIndex();
                    } else {
                        echo (new CashierController($this->id, $this->module))->actionIndex();
                    }
                } else {
                    echo '[{"errors": "Невалидный параметр"}]';
                }
        return false;
    }*/
}