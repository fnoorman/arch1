<?php

namespace backend\models;

use Yii;


/**
 * This is the model class for table "webcomic_sequence".
 *
 * @property integer $id
 * @property integer $qrcode_id
 * @property integer $sequence
 * @property string $filename
 *
 * @property Qrcode $qrcode
 */
class WebcomicSequence extends \yii\db\ActiveRecord
{
    public $image;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'webcomic_sequence';
    }

     public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['qrcode_id'], 'required'],
            [['qrcode_id', 'sequence'], 'integer'],
            [['filename'], 'string', 'max' => 45],
            [['image'],'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'qrcode_id' => 'Qrcode ID',
            'sequence' => 'Sequence',
            'filename' => 'Filename',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQrcode()
    {
        return $this->hasOne(Qrcode::className(), ['id' => 'qrcode_id']);
    }

    public function getImageUrl(){
        $image = $this->getImage();
        return $image->getUrl('x100');
    }

    public function getAutoSequence($detect){
      if($detect === 'space'){
        if(preg_match('/[\s,]+/',$this->filename))
        {
          // Remove the extension
          $fileWithNoExtension = explode(".",$this->filename)[0];
          //get the sequence
          $tempfile = preg_split('/[\s,]+/',$fileWithNoExtension);
          $this->sequence = intval(end($tempfile));
        }
        return null;
      }

      if($detect === 'dash'){
        if(preg_match('/[\-,]+/',$this->filename))
        {
          // Remove the extension
          $fileWithNoExtension = explode(".",$this->filename)[0];
          //get the sequence
          $tempfile = preg_split('/[\-,]+/',$fileWithNoExtension);
          $this->sequence = intval(end($tempfile));
        }

      }

    }
}
