<?php

namespace common\models;

use Yii;
use yii\db\Query;
use common\models\CategoryQuery;
use common\components\behaviors\ClosureTable;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $name
 *
 * @property CategoryTree[] $categoryTrees
 */
class Category extends \yii\db\ActiveRecord
{
    
    public $leaf;

    public $isRoot;

    public function behaviors() {
        return [
            [
                'class' => ClosureTable::className(),
                'tableName' => 'category_tree'
            ],
        ];
    }

    public static function find()
    {
        return new CategoryQuery(static::className());
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
            ['isRoot','boolean'],
            ['isRoot','safe']
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryTrees()
    {
        return $this->hasMany(CategoryTree::className(), ['parent' => 'id']);
    }

    public function getRoot()
    {
        $query = (new Query())->select('parent')->from('category_tree');
        $query->where(['and','parent=:parent_id','child=:parent_id','depth=:zero'],[':parent_id'=>$this->id,':zero'=>'0']);
        return $query->exists();
    }
}
