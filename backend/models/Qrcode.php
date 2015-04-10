<?php

namespace backend\models;

use Yii;
use backend\models\WebcomicSequence;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "qrcode".
 *
 * @property integer $id
 * @property string $code
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $create_by
 * @property integer $start_at
 * @property integer $end_by
 * @property integer $updated_by
 * @property integer $category_id
 * @property integer $client_id
 *
 * @property MotioncomicSequence[] $motioncomicSequences
 * @property Qrinfo[] $qrinfos
 * @property WebcomicSequence[] $webcomicSequences
 */
class Qrcode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */


    public static function tableName()
    {
        return 'qrcode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'create_by', 'start_at', 'end_by', 'updated_by', 'category_id', 'client_id'], 'integer'],
            [['category_id', 'client_id'], 'required'],
            [['code'], 'string', 'max' => 19],
            [['code'],'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Code'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'create_by' => Yii::t('app', 'Create By'),
            'start_at' => Yii::t('app', 'Start At'),
            'end_by' => Yii::t('app', 'End By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'category_id' => Yii::t('app', 'Category ID'),
            'client_id' => Yii::t('app', 'Client ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMotioncomicSequences()
    {
        return $this->hasMany(MotioncomicSequence::className(), ['qrcode_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQrinfos()
    {
        return $this->hasMany(Qrinfo::className(), ['qrcode_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWebcomicSequences()
    {
        return $this->hasMany(WebcomicSequence::className(), ['qrcode_id' => 'id']);
    }

    public static function getCategoryName($category_id){
        return ArrayHelper::map(self::getCategoryList(),'id','category')[$category_id];
    }

    public static function getClientName($client_id){
        return ArrayHelper::map(self::getClientList(),'id','client')[$client_id];
    }

    // public function getClientId(){
    //     if ($this->client_id === 1)
    //         return 'Ujang';
    //     else if ($this->client_id === 2) {
    //         # code...
    //         return 'APO?';
    //     }
    //     else
    //         return 'Unset';
    // }

    // public function getClientName(){
    //     if ($this->client_id === 'Ujang')
    //         return 1;
    //     else if ($this->client_id === 'APO?') {
    //         # code...
    //         return 2;
    //     }
    //     else
    //         return null;
    // }

    public function getGallery(){
        $items = [];
        $records = $this->webcomicSequences;
        if(isset($records)){
            $count = 1;
            foreach ($records as $record) {
                $temp = WebcomicSequence::findOne($record->id);
                $item =[
                    'src' => $temp->getImage()->getUrl('x100'),
                    'url' => $temp->getImage()->getUrl(),
                    'options' => array('title' => 'Sequence : '.$count) 
                ];
                $items[]=$item;
                $count++;
            }
        }

        return $items;
    }

    public static function getCategoryList(){
        return [
            ['id'=>'1', 'category'=> 'Web Comic'],
            ['id'=>'2', 'category' => 'Motion Comic'],
            ['id'=>'3','category' => 'Hybrizine'],
            ['id'=>'4','category' => 'Merchandise']
        ];
    }

    public static function getClientList(){
        return [
            ['id'=>'1', 'client'=> 'Ujang'],
            ['id'=>'2', 'client' => 'APO?']
        ];
    }

    

    
}
