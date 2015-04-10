<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $alias
 * @property string $profile_image
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $image;
    public static function tableName()
    {
        return 'profile';
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
            [['first_name', 'last_name', 'alias'], 'required'],
            [['id'], 'integer'],
            [['first_name', 'last_name', 'alias','profile_image'], 'string', 'max' => 45],
            [['image'],'safe'],
            [['image'],'file','extensions'=>'jpg,gif,png'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'alias' => Yii::t('app', 'Alias'),
            'profile_image' => Yii::t('app', 'Profile Image'), 
        ];
    }

    public function getProfileImage($pathOnly = false){
        if($pathOnly)
            return Yii::$app->basePath.Yii::$app->params['profileUploadPath'].$this->id;
        else
            return Yii::$app->basePath.Yii::$app->params['profileUploadPath'].$this->id.'/'.$this->profile_image;
    }

    private function delTree($dir)
    { 
        $files = array_diff(scandir($dir), array('.', '..')); 

        foreach ($files as $file) { 
            (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
        }

        return rmdir($dir); 
    } 
}
