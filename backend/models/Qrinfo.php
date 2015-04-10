<?php

namespace backend\models;

use Yii;
use backend\models\Profile;

/**
 * This is the model class for table "qrinfo".
 *
 * @property integer $id
 * @property integer $artist_id
 * @property integer $author_id
 * @property integer $grartist_id
 * @property string $description
 * @property integer $qrcode_id
 *
 * @property Qrcode $qrcode
 */
class Qrinfo extends \yii\db\ActiveRecord
{
    

    public $image;
    public $code;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'qrinfo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['artist_id', 'qrcode_id'], 'required'],
            [['id', 'artist_id', 'author_id', 'grartist_id', 'qrcode_id'], 'integer'],
            [['description','code'], 'string'],
            [['image'],'safe'],
            [['image'],'file','extensions'=>'jpg,gif,png'],
            [['code'],'safe']
        ];
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
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'artist_id' => Yii::t('app', 'Artist'),
            'author_id' => Yii::t('app', 'Author'),
            'grartist_id' => Yii::t('app', 'Grarphic Artist'),
            'description' => Yii::t('app', 'Description'),
            'qrcode_id' => Yii::t('app', 'Qrcode ID'),
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

    public function getCoverImage(){
        $image = $this->getImage();
        if(isset($image))
            return $image->getUrl('200x270');
        else
            return "http://dummyimage.com/200x270&text=200 x 270 ";
            // return 'http://lorempixel.com/200/270/abstract';
    }

    public function getArtist(){
        $artist = Profile::findOne($this->artist_id);
        return $artist->alias;
    }

    public function getAuthor(){
        $author = Profile::findOne($this->author_id);
        return $author->alias;
    }

    public function getGraphicArtist(){
        $grartist = Profile::findOne($this->grartist_id);
        return $grartist->alias;
    }
}
