<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "motioncomic_sequence".
 *
 * @property integer $id
 * @property integer $qrcode_id
 * @property integer $sequence
 * @property string $filename
 * @property string $width
 * @property string $height
 * @property string $options
 *
 * @property Qrcode $qrcode
 */
class MotioncomicSequence extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $code;

    public static function tableName()
    {
        return 'motioncomic_sequence';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['qrcode_id'], 'required'],
            [['qrcode_id', 'sequence'], 'integer'],
            [['options'], 'string'],
            [['filename'], 'string', 'max' => 255],
            [['width', 'height'], 'string', 'max' => 4],
            [['code'],'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'qrcode_id' => Yii::t('app', 'Qrcode ID'),
            'sequence' => Yii::t('app', 'Sequence'),
            'filename' => Yii::t('app', 'URL Link'),
            'width' => Yii::t('app', 'Width'),
            'height' => Yii::t('app', 'Height'),
            'options' => Yii::t('app', 'Options'),
            'code' => Yii::t('app', 'QR Code'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQrcode()
    {
        return $this->hasOne(Qrcode::className(), ['id' => 'qrcode_id']);
    }
}
