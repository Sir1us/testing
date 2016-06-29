<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cashier".
 *
 * @property integer $id
 * @property string $name
 * @property string $second_name
 * @property integer $agreement_id
 */
class Cashier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cashier';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['agreement_id'], 'integer'],
            [['name', 'second_name'], 'string', 'max' => 40]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'second_name' => Yii::t('app', 'Second Name'),
            'agreement_id' => Yii::t('app', 'Agreement ID'),
        ];
    }
}
