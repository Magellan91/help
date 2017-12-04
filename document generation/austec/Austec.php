<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "austec".
 *
 * @property integer $id
 * @property string $company
 * @property string $fio
 * @property string $adres
 * @property string $phone
 * @property string $email
 * @property string $area
 * @property string $type
 * @property string $height
 * @property string $windows
 * @property string $heat
 * @property string $people
 * @property string $watt
 * @property string $type_cond
 * @property string $make
 * @property string $custom
 * @property string $date
 */
class Austec extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'austec';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['custom'], 'string'],
            [['company', 'fio', 'adres', 'phone', 'email', 'area', 'type', 'height', 'windows', 'heat', 'people', 'watt', 'type_cond', 'make', 'date'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'company' => Yii::t('app', 'Company'),
            'fio' => Yii::t('app', 'Fio'),
            'adres' => Yii::t('app', 'Adres'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'area' => Yii::t('app', 'Area'),
            'type' => Yii::t('app', 'Type'),
            'height' => Yii::t('app', 'Height'),
            'windows' => Yii::t('app', 'Windows'),
            'heat' => Yii::t('app', 'Heat'),
            'people' => Yii::t('app', 'People'),
            'watt' => Yii::t('app', 'Watt'),
            'type_cond' => Yii::t('app', 'Type Cond'),
            'make' => Yii::t('app', 'Make'),
            'custom' => Yii::t('app', 'Custom'),
            'date' => Yii::t('app', 'Date'),
        ];
    }
}
