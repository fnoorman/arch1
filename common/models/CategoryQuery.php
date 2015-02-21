<?php  
namespace common\models;

use yii\db\ActiveQuery;
use common\components\behaviors\ClosureTableQuery;

class CategoryQuery extends ActiveQuery
{
    public function behaviors() {
        return [
            [
                'class' => ClosureTableQuery::className(),
                'tableName' => 'category_tree'
            ],
        ];
    }
}

?>