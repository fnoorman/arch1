<?php  
namespace common\components\rest;

use Yii;
use yii\data\ActiveDataProvider;
use backend\models\Qrcode;
use backend\models\MotionComicSequence;

class HybrizineAction extends Action
{
    /**
     * Displays a model.
     * @param string $id the primary key of the model.
     * @return \yii\db\ActiveRecordInterface the model being displayed
     */
    public function run($code)
    {
        // $model = $this->findModel($id);
        $qrcode = Qrcode::find()->where('code'=>$code)->one();

        $provider = new ActiveDataProvider([
        	'query' => $qrcode->getMotioncomicSequences()
    	]);
        if ($this->checkAccess) {
            call_user_func($this->checkAccess, $this->id, $model);
        }

        return $model;
    }
}

?>