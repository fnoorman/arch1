<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Country".
 *
 * @property integer $id
 * @property string $name
 * @property string $iso_code_2
 * @property string $iso_code_3
 * @property string $address_format
 * @property integer $postcode_required
 * @property integer $status
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address_format', 'postcode_required'], 'required'],
            [['address_format'], 'string'],
            [['postcode_required', 'status'], 'integer'],
            [['name'], 'string', 'max' => 128],
            [['iso_code_2'], 'string', 'max' => 2],
            [['iso_code_3'], 'string', 'max' => 3]
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
            'iso_code_2' => Yii::t('app', 'Iso Code 2'),
            'iso_code_3' => Yii::t('app', 'Iso Code 3'),
            'address_format' => Yii::t('app', 'Address Format'),
            'postcode_required' => Yii::t('app', 'Postcode Required'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
