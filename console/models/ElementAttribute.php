<?php

namespace console\models;

use Yii;

/**
 * This is the model class for table "element_attribute".
 *
 * @property string $name
 * @property string $theme
 */
class ElementAttribute extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'element_attribute';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'theme'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'theme' => Yii::t('app', 'Theme'),
        ];
    }
}
